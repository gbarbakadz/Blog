@extends('layouts.app2')

@section('content')

    <div class="container">
        <h1>Edit Profile</h1>
        <hr>
        <div class="row">
            <!-- left column -->


            <!-- edit form column -->
            <div class="col-md-9 personal-info">
                <div class="alert alert-info alert-dismissable">
                    <a class="panel-close close" data-dismiss="alert">×</a>
                    <i class="fa fa-coffee"></i>
                    @if(isset($alert))
                        {{ $alert }}
                </div>
                @endif
                <h3>Personal info</h3>

                <form action="/editprofilestore" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="form-group ">
                        <label for="fname" class="col-md-3 col-form-label ">First Name</label>

                        <div class="col-md-8">
                            <input id="fname" type="fname" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ auth()->user()->fname }}" required autocomplete="fname">

                            @error('fname')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="lname" class="col-md-3 col-form-label ">Last Name</label>

                        <div class="col-md-8">
                            <input id="lname" type="lname" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ auth()->user()->lname }}" required autocomplete="lname">

                            @error('lname')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-md-3 col-form-label">E-Mail Address</label>

                        <div class="col-md-8">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ auth()->user()->email }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username" class="col-md-3 col-form-label ">Username</label>

                        <div class="col-md-8">
                            <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ auth()->user()->username }}" required autocomplete="username">

                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="password" class="col-md-3 control-label">Password:</label>

                        <div class="col-md-8">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="col-md-3 control-label">Confirm Password:</label>

                        <div class="col-md-8">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Post Image</label>
                        <div class="col-md-8">
                            <input  class="form-control-file" name="profileimage" type="file" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                            <input type="submit" class="btn btn-primary" value="Save Changes">
                            <span></span>
                            <input type="reset" class="btn btn-default" value="Cancel">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <hr>
    @endsection
