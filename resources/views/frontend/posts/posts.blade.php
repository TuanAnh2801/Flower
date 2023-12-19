@extends('frontend.posts.layouts.app')
@section('content')
    <section class="banner">
        <div class="banner-main-content">
            <h2>NHẬN BÀI VIÊT MỚI NHẤT</h2>
            <h3>Shop hoa số 1 Hà Nội</h3>

            <button>
                <a style="text-decoration: none" href="{{ url('showIntroduce') }}">Know More</a>
            </button>

            <div class="current-news-head">
                <h3>Đón xuân tươi mới với bó hoa thơm ngát từ cửa hàng của chúng tôi!</span></h3>

                <h3>Cùng tôi thổi hồn cho không gian sống với những bó hoa đẹp nhất!</h3>

                <h3>Tình yêu của bạn được thể hiện qua những bông hoa tuyệt đẹp từ cửa hàng của chúng tôi!</h3>

            </div>
        </div>

        <div class="banner-sub-content">

            @foreach ($featuredPostsView as $post)
                <div class="hot-topic">
                    @foreach (json_decode($post->images) as $key => $image)
                        @if ($key == 0)
                            <img src="{{ asset('storage/backend/posts/' . $image) }}" width="350px" height="350px"
                                alt="" class="post-img">
                        @endif
                    @endforeach
                    <div class="hot-topic-content">
                        <h2>{{ $post->category->name }}</h2>
                        <h3 style="text-shadow: 2px 2px 9px #000000; font-weight: bold;">New Topic 1</h3>
                        <p class="post-description" style="text-shadow: 2px 2px 10px #cd5151;">{!! Str::limit(strip_tags($post->content), 100, '...') !!}
                        </p>
                        <a style="text-decoration: none;  font-weight: bold;" href="{{ url("/post/$post->id") }}">Read
                            More</a>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
    <hr>

    {{-- <main>
        @foreach ($categoriesPost as $items)
            @if (count($items['posts']) > 0)
                <section class="main-container-left">

                    <h2>Top Stories</h2>
                    <div class="container-top-left">
                        @foreach ($categoryWithMostViews as $post)
                            
                      
                        <article>
                            <img src="images/top-left.jpg">

                            <div>
                                <h3>Best Used Cars Under $20, 000 for families</h3>

                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis ea sint, nisi rem
                                    earum
                                    fugit? Facere veritatis sapiente eveniet quibusdam.</p>

                                <a href="#">Read More <span>>></span></a>
                            </div>
                        </article>

                        @endforeach
                    </div>

                    <div class="container-bottom-left">


                        @foreach ($items['posts'] as $post)
                         
                            <article>

                                @foreach (json_decode($post['images']) as $key => $image)
                                    @if ($key == 0)
                                        <img src="{{ asset('storage/backend/posts/' . $image) }}" width="350px"
                                            height="350px" alt="" class="post-img">
                                    @endif
                                @endforeach
                                <div>
                                    <h3>{{ $post['title'] }}</h3>
                                    <p class="post-description" style="text-shadow: 2px 2px 10px #cd5151;">{!! Str::limit(strip_tags($post['content']), 100, '...') !!}</p>


                                    <a style="text-decoration: none;  font-weight: bold;" href="{{  route('posts.details', $post['id']) }}">Read
                                        More</a>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </section>

                <section class="main-container-right">
                    <h2>Latest Stories</h2>

                    <article>
                        <h4>just in </h4>
                        <div>
                            <h2>Here's how to track your stimulus check with the IRS Get My Payment Portal</h2>

                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, repellendus?</p>

                            <a href="#">Read More <span>>></span></a>
                        </div>
                        <img src="images/right-1.jpg">
                    </article>

                    
                </section>
            @endif
        @endforeach
    </main> --}}
    <main>
        <section class="main-container-left">
            <h2>Top Stories</h2>
            @if($categoryWithMostViews !=null)

            {{-- @if (count($categoryWithMostViews) > 0 && count($categoryWithMostViews[0]->posts) > 0) --}}
                <div class="container-top-left">
                    {{-- @foreach ($categoryWithMostViews as $item) --}}
                    {{-- @dd($categoryWithMostViews) --}}
                        {{-- @foreach ($item->posts as $post) --}}
                            <article>
                                <img src="{{ asset('storage/backend/posts/' . json_decode($categoryWithMostViews['images'])[0]) }}">
                                <span class="post-date">{{ \Carbon\Carbon::parse($categoryWithMostViews['published_at'])->format('d M Y') }}</span>
                                <div>
                                    <h3>{{ $categoryWithMostViews['title'] }}</h3>
                                    <p>{!! Str::limit(strip_tags($categoryWithMostViews['content']), 1000, '...') !!}</p>
                                    <a style="text-decoration: none; font-weight: bold;"
                                        href="{{ route('posts.details', $categoryWithMostViews->id) }}">Read More <span>>></span></a>
                                </div>
                            </article>
                        {{-- @endforeach --}}
                    {{-- @endforeach --}}
                </div>
            @else
                <p>Nay không có tin nào nổi bật</p>
            @endif

            {{-- <h2>Latest Stories</h2>
            <div class="container-bottom-left">
                @foreach ($categoriesPost as $category)
                    @foreach ($category['posts'] as $post)
                        <article>
                            <img src="{{ asset('storage/backend/posts/' . json_decode($post['images'])[0]) }}" width="350px" height="350px" alt="" class="post-img">
                            <div>
                                <h3>{{ $post['title'] }}</h3>
                                <p class="post-description" style="text-shadow: 2px 2px 10px #cd5151;">
                                    {!! Str::limit(strip_tags($post['content']), 100, '...') !!}
                                </p>
                                <a style="text-decoration: none; font-weight: bold;" href="{{ route('posts.details', $post['id']) }}">Read More</a>
                            </div>
                        </article>
                    @endforeach
                @endforeach
            </div> --}}
        </section>
        <section class="main-container-right">
            <div class="d-flex justify-content-between">
                <h2>Featured Posts </h2>
                <div>
                    @include('frontend.posts.layouts._filter_right')
                </div>
            </div>
            @if (count($featuredPosts) > 0)
                @foreach ($featuredPosts as $post)
                    <article>
                        <img src="{{ asset('storage/backend/posts/' . json_decode($post['images'])[0]) }}" width="250px"
                            height="250px" alt="">
                        <div>
                            <h3>{{ $post['title'] }}</h3>
                            <p class="post-description" style="text-shadow: 2px 2px 10px #cd5151;">
                                {!! Str::limit(strip_tags($post['content']), 100, '...') !!}
                            </p>
                            <a style="text-decoration: none; font-weight: bold;"
                                href="{{ route('posts.details', $post['id']) }}">Read More</a>
                        </div>
                    </article>
                @endforeach
            @else
                <p>Kết quả trống</p>
            @endif
            {{ $featuredPosts->links() }}

        </section>
    </main>
    {{-- <main>
        @foreach ($categoriesPost as $category)
            @if (count($category['posts']) > 0)
                <section class="main-container-left">
                    <h2>Top Stories</h2>
                    <div class="container-top-left">
                        @foreach ($categoryWithMostViews as $item)
                            @foreach ($item->posts as $post)
                                <article>
                                    <img src="{{ asset('storage/backend/posts/' . json_decode($post->images)[0]) }}">
                                    <div>
                                        <h3>{{ $post->title }}</h3>
                                        <p>{{ $post->content }}</p>
                                        <a href="{{ route('posts.details', $post->id) }}">Read More <span>>></span></a>
                                    </div>
                                </article>
                            @endforeach
                        @endforeach
                    </div>
                    <div class="container-bottom-left">
                        @foreach ($category['posts'] as $post)
                            <article>
                                <img src="{{ asset('storage/backend/posts/' . json_decode($post['images'])[0]) }}">
                                <div>
                                    <h3>{{ $post['title'] }}</h3>
                                    <p>{{ $post['content'] }}</p>
                                    <a href="{{ route('posts.details', $post['id']) }}">Read More <span>>></span></a>
                                </div>
                            </article>
                            @if ($loop->iteration == 2)
                                @break
                            @endif
                        @endforeach
                    </div>
                </section>
                <section class="main-container-right">
                    <h2>Latest Stories</h2>
                    @foreach ($featuredPosts as $post)
                        <article>
                            <h4>just in </h4>
                            <div>
                                <h2>{{ $post->title }}</h2>
                                <p>{{ $post->content }}</p>
                                <a href="{{ route('posts.details', $post->id) }}">Read More <span>>></span></a>
                            </div>
                            <img src="{{ asset('storage/backend/posts/' . json_decode($post->images)[0]) }}">
                        </article>
                    @endforeach
                </section>
            @endif
        @endforeach
    </main> --}}
@endsection
