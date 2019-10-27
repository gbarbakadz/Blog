@extends('layouts.app2')

@section('content')

    <div class="container ">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="my-4">Tag :  {{ $tag->name }}
                </h1>

                <!-- Blog Post -->
                @foreach($tag->post as $post)
                    <div class="card mb-4">
                        @if(isset($post->image))
                            <img class="card-img-top" src="/storage/{{ $post->image }}" alt="Card image cap">
                        @else
                            <img class="card-img-top" src="https://wpblogdesigner.net/wp-content/plugins/blog-designer-pro/images/related_post_no_available_image.png" width="750" height="300" alt="Card image cap">
                        @endif
                        <div class="card-body">
                            <h2 class="card-title">{{ $post->title }}</h2>
                            <p class="card-text">{{ $post->body }}</p>
                            @if($post->count() > 0 )
                                Tags :
                                @foreach($post->tag as $tag)
                                    <a href="/post/tag/{{ $tag->id }}"  class="btn btn-light">{{ $tag->name }}</a>
                                @endforeach
                                <br>
                                <br>
                            @endif
                            <a href="/post/{{ $post->id }}" class="btn btn-primary">Read More &rarr;</a>
                        </div>
                        <div class="card-footer text-muted">
                            {{ $post->created_at }} by
                            <a href="/profile/{{ $post->user->id }}">{{ $post->user->username }}</a>
                        </div>
                    </div>
            @endforeach


            <!-- Pagination -->
                <ul class="pagination justify-content-center mb-4">
                    <p> {{ $posts->links() }}</p>
                </ul>

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
                    <h5 class="card-header">Top HashTags</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                @foreach($hashtags as $tag)
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <a href="/post/tag/{{ $tag->id }}">{{ $tag->name }}</a>
                                    </ul>
                                @endforeach

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
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
        </div>
        <!-- /.container -->
    </footer


@endsection
