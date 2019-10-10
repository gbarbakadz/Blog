<?php

namespace App\Http\Controllers;

use App\User;
use Faker\Provider\File;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Testing\Concerns\MakesHttpRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function profile($id) {
        $user = User::FindOrFail($id);
        return view('home' , compact('user'));
    }

    public function editprofile() {
        $user = Auth::user();
        return view('editprofile' , compact('user'));
    }

    public function editprofilestore()
    {

        $data = \request()->validate([
            'fname' => ['required' , 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username,'.\auth()->user()->id ],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.\auth()->user()->id ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image' => ['image'],


        ]);

        if (\request('profileimage')) {
            $imagePath = \request('profileimage')->store('/uploads/profileimage' , 'public');
            $image = Image::make(public_path('storage/'. $imagePath))->fit(300, 200);
            $image->save();
        }
        else {
            $imagePath = \auth()->user()->image;
        }


        \auth()->user()->update([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'image' => $imagePath,

        ]);



        return redirect('/profile/'. \auth()->user()->id);

    }
    public function createpost() {
        return view('createpost');
    }
}
