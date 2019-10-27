@extends('layouts.app2')

@section('content')


<div class="container ">

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

            <!-- Title -->
            <h1 class="mt-4">{{ $post->title }}</h1>

            <!-- Author -->
            <p class="lead">
                by
                <a href="/profile/{{ $post->user->id }}">{{ $post->user->username }}</a>
            </p>

            <hr>

            <!-- Date/Time -->
            <p>Posted on {{ $post->created_at }}</p>

            <hr>

            <!-- Preview Image -->
            @if(isset($post->image))
            <img class="img-fluid rounded" src="/storage/{{ $post->image }}"  width="900" height="300" alt="">
            @else
                <img class="card-img-top" src="https://wpblogdesigner.net/wp-content/plugins/blog-designer-pro/images/related_post_no_available_image.png" width="900" height="300" alt="Card image cap">
            @endif
                <hr>

            <!-- Post Content -->
            <p class="lead">{{ $post->body }}</p>


            <hr>

            <!-- Comments Form -->
            <div class="card my-4">
                <h5 class="card-header">Leave a Comment:</h5>
                <div class="card-body">
                    <form action="/commentstore/{{ $post->id }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control"
                                      name="comment"
                                      rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

            <!-- Single Comment -->
            @foreach($comments as $comment)
            <div class="media mb-4">
                @if(isset($comment->user->image))
                <img class="d-flex mr-3 rounded-circle" src="/storage/{{ $comment->user->image }}" width="50" height="50" alt="">
                @else
                    <img class="d-flex mr-3 rounded-circle" src="https://previews.123rf.com/images/bearsky23/bearsky231608/bearsky23160800013/61158516-standard-user-icon-set-with-men-women-and-multiple-people.jpg" width="50" height="50" alt="">
                @endif
                    <div class="media-body">
                    <a href="/profile/{{ $comment->user->id }}"> <h5 class="mt-0">{{ $comment->user->username }}</h5></a>
                    {{ $comment->comments  }}
                    <div >
                        <a href="#">replay</a>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- Comment with nested comments -->


        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Search Widget -->
            <div class="card my-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
                    </div>
                </div>
            </div>

            <!-- Categories Widget -->
            <div class="card my-4">
                <h5 class="card-header">Categories</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">Web Design</a>
                                </li>
                                <li>
                                    <a href="#">HTML</a>
                                </li>
                                <li>
                                    <a href="#">Freebies</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">JavaScript</a>
                                </li>
                                <li>
                                    <a href="#">CSS</a>
                                </li>
                                <li>
                                    <a href="#">Tutorials</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Top Users</h5>
                <div class="card-body">
                    @foreach($users as $user)
                        <a href="/profile/{{ $user->id }}"> <p>{{ $user->username }}</p></a>
                    @endforeach
                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dar pt-5">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
</footer>

@endsection
