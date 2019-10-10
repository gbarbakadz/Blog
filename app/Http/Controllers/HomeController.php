<?php

namespace App\Http\Controllers;

use App\Post;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index() {
        $post = Post::all();
        $user = \App\User::withCount('post')->orderBy('post_count' , 'desc')->take(10)->get();


        return view('welcome' , compact('post' , 'user'));
    }

    public function logout() {
        Auth::logout();;
        return redirect('/');
    }

    public function about() {
        return view('about');
    }
}
