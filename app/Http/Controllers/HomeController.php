<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index() {
        $posts = Post::paginate(5);
        $users = \App\User::withCount('post')->orderBy('post_count' , 'desc')->take(10)->get();
        $hashtags = Tag::withCount('post')->orderBy('post_count' , 'desc')->take(10)->get();


        return view('welcome' , compact('posts' , 'users' , 'hashtags'));
    }

    public function logout() {
        Auth::logout();;
        return redirect('/');
    }

    public function about() {
        return view('about');
    }
}
