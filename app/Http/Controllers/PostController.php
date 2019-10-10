<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use phpDocumentor\Reflection\Types\Null_;

class PostController extends Controller
{


    public function post($id) {
        $post = Post::FindOrFail($id);
        $comm = $post->comment()->orderBy('id', 'DESC')->get();
        return view('post' , compact('post' , 'comm' ));
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

        return redirect('/');
    }

    public function editpost() {
        $user = Auth::user();

        return view('editpost' , compact('user'));

    }

    public function deletepost($id) {
        $post = Post::FindOrFail($id);
        $post->delete();

        return redirect('/editpost');

    }
}
