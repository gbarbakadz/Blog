@extends('layouts.app2')

@section('content')

    <!------ Include the above in your HEAD tag ---------->

    <link href="{{ asset('profile.css') }}" rel="stylesheet" type="text/css" >


    <div class="container emp-profile">
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div >
                        @if(isset($user->image))
                        <img src="/storage/{{ $user->image }}" alt="">
                        @else
                            <img src="https://previews.123rf.com/images/bearsky23/bearsky231608/bearsky23160800013/61158516-standard-user-icon-set-with-men-women-and-multiple-people.jpg" width="300" height="200">
                        @endif

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                            {{ $user->fname . " " . $user->lname }}
                        </h5>
                        <p>|</p>
                        <p>|</p>
                        <p>|</p>

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Postpage</a>
                            </li>

                        </ul>
                    </div>
                </div>
                @if( auth()->user()->id == request()->segment(2))
                <div class="col-md-2">
                    <a href="/editprofile" class="btn btn-light">Edit Profile</a>

                </div>
                    @endif
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">

                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>User Id</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->id }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Full Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->fname . " " . $user->lname }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Username</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->username }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->email }}</p>
                                </div>
                            </div>



                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Posts</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->post()->count() }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Comments</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->comment()->count() }}</p>
                                </div>
                            </div>







                            @if(auth()->user()->id == \request()->segment(2))

                            <div class="row">
                                <div class="col-md-12">
                                    <p>--------------------------------------------------------------------</p>
                                    <a href="/createpost"><p>Create post</p></a>
                                    <a href="/editpost"><p>Edit post</p></a>
                                </div>
                            </div>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>





@endsection
