<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tag;

class TagController extends Controller
{
    public function index($id) {
        $tag = \App\Tag::find($id);
        $posts = \App\Tag::where('id' , '=' , $id)->paginate(2);
        $users = User::withCount('post')->orderBy('post_count' , 'desc')->take(10)->get();
        $hashtags = \App\Tag::withCount('post')->orderBy('post_count' , 'desc')->take(10)->get();


        return view('tags' , compact('posts' , 'users' , 'hashtags' , 'tag'));
    }
}
