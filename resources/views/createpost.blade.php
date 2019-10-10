@extends('layouts.app2')

@section('content')


    <div class="container pt-5">
        <div class="row justify-content-center">

            <h1>Create New Post</h1>

        </div>
        <form action="/storepost" enctype="multipart/form-data" method="post">
            @csrf
        <div class="form-group row pt-5">
            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

            <div class="col-md-6">
                <input id="title"
                       type="title"
                       class="form-control @error('title') is-invalid @enderror"
                       name="title"
                       value="{{ old('title') }}"
                       required autocomplete="title" autofocus>


            </div>
        </div>

            <div class="form-group row">
                <label for="text" class="col-md-4 col-form-label text-md-right">Text</label>

                <div class="col-md-6">
                    <textarea class="form-control "
                              name="body"
                              rows="10"
                              cols="30"></textarea>

                    @error('text')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 control-label text-md-right">Post Image</label>
                <div class="col-md-6">
                    <input  class="form-control-file" name="postimage" type="file" >
                </div>
            </div>



            <div class="row">
                <div class="col-8 offset-4">
                    <button class="btn btn-primary">Post</button>
                </div>
            </div>


        </form>
    </div>

@endsection

