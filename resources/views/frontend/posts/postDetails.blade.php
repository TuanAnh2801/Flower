@extends('frontend.posts.layouts.app')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><b style="font-size: 23px">{{ $posts->title }}</b></div>
                    @foreach (json_decode($posts->images) as $key => $image)
                        @if ($key == 0)
                            <img style="filter: none" src="{{ asset('storage/backend/posts/' . $image) }}" width="350px" height="350px"
                                alt=""class="post-img">
                            {{-- <div style="background-image: url('{{ asset('storage/backend/posts/' . $image) }}'); filter: blur(10px);" class="post-img"></div> --}}
                        @endif
                    @endforeach
                    <div class="card-body">
                        {!! $posts->content !!}
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Author</div>

                    <div class="card-body">
                        <div class="media">
                            <img src="{{ asset('storage/frontend/userProfile/' . $posts->user->avatar) }}" width="200px" height="200px" class="mr-3"
                                alt="Author Image">
                            <div class="media-body">
                                <h5 class="mt-0">{{ $posts->user->user_name }}</h5>
                                <p>{{ $posts->user->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Author</div>

                    <div class="card-body">
                        <div class="media">
                            <img src="{{ asset('storage/frontend/userProfile/' . $posts->user->avatar) }}" width="200px"
                                height="200px" class="mr-3" alt="Author Image">
                            <div class="media-body">
                                <h5 class="mt-0">{{ $posts->user->user_name }}</h5>
                                <p>{{ $posts->user->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">Similar Posts</div>

                    <div class="card-body">
                        {{-- <div class="row">
                            @foreach ($similarPosts as $similarPost)
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header">{{ $similarPost->title }}</div>
                                        <div class="card-body">
                                            @foreach (json_decode($similarPost->images) as $key => $image)
                                                @if ($similarPost->images)
                                                   
                                                    <img src="{{ asset('storage/backend/posts/' . $image) }}" width="350px"
                                                        height="350px" alt=""class="post-img">
                                                @endif
                                            @endforeach
                                            <p>{{ $similarPost->content }}</p>
                                            <a style="text-decoration: none; font-weight: bold;"
                                                href="{{ route('posts.details', $similarPost['id']) }}">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div> --}}

                        @if (count($similarPosts) > 0)
                            @foreach ($similarPosts as $similarPost)
                                <article>

                                    @foreach (json_decode($similarPost->images) as $key => $image)
                                        @if ($similarPost->images)
                                            {{-- @dd($similarPost->images) --}}
                                            <img src="{{ asset('storage/backend/posts/' . $image) }}" width="200px"
                                                height="200px" alt=""class="post-img">
                                        @endif
                                    @endforeach
                                    <div>
                                        <h3>{{ $similarPost->title }}</h3>
                                        <p class="post-description" style="text-shadow: 2px 2px 10px #cd5151;">
                                            {!! Str::limit(strip_tags($similarPost->content), 100, '...') !!}
                                        </p>
                                        <a style="text-decoration: none; font-weight: bold;"
                                            href="{{ route('posts.details', $similarPost->id) }}">Read More</a>
                                    </div>
                                </article>
                            @endforeach
                        @else
                            <p>Kết quả trống</p>
                        @endif
                        {{ $similarPosts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
