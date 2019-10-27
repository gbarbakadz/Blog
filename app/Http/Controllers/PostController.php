<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use phpDocumentor\Reflection\Types\Null_;

class PostController extends Controller
{


    public function post($id) {
        $post = Post::FindOrFail($id);
        $comments = $post->comment()->orderBy('id', 'DESC')->get();
        $users = \App\User::withCount('post')->orderBy('post_count' , 'desc')->take(10)->get();
        return view('post' , compact('post' , 'comments' , 'users' ));
    }


    public function storepost() {
        $data = \request()->validate([
            'title' => 'required',
            'body'  => 'required',
            'postimage' => 'image',
        ]);

        if (request('postimage')) {
            $imagePath = \request('postimage')->store('/uploads/postimage' , 'public');
            $image = Image::make('storage/'. $imagePath)->fit(750 , 300);
            $image->save();
        } else {
            $imagePath = null;
        }


        auth()->user()->post()->create([
            'title' => $data[('title')],
            'body' => $data[('body')],
            'image' => $imagePath,
        ]);

        if (\request('tag')) {


            $array = explode(' ' , \request('tag'));
            $post = Post::all()->sortBy('created_at')->last();

            foreach ($array as $arr) {


                if (Tag::where('name',  $arr)->exists()) {
                    $tagged = Tag::where('name' , $arr)->first();
                    $post->tag()->attach($tagged);
                }
                else {
                    $tag = new Tag();
                    $tag->name = $arr;
                    $tag->save();
                    $tagged = Tag::where('name' , $arr)->first();
                    $post->tag()->attach($tagged);
                }


            }



        }

        return redirect('/');
    }

    public function editpost() {
        $user = Auth::user();
        return view('editpost' , compact('user' ));

    }

    public function deletepost($id) {
        $post = Post::FindOrFail($id);
        $post->delete();

        return redirect('/editpost');

    }
}
