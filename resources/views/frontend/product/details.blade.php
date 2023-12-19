@extends('frontend.layouts.app')

@section('content')
    <div class="container ">


        <div class="row">
            <div class="col-md-5">
                @foreach ($products->img as $x => $image)
                    <div class="product-wrapper">
                        <img src="{{ asset('storage/backend/product/' . $image) }}" style="width:500px; height:500px" />
                        <div class="views">{{ $products->views }} <i class="fa-regular fa-eye"></i></div>
                    </div>
                @endforeach
            </div>
            <div id="text" class=" col-md-7">
                <h1>{{ $products->name }}</h1>
                <h4>Loại: {{ $products->category->name_category }}</h4>
                <h2><i class="fa-solid fa-money-bill-1"></i>:{{ number_format($products->price) }}vnđ</h2>

                <h5>{{ $products->category['desc'] }}</h5>

                <p><i class="fa-solid fa-check"></i>Tặng MIỄN PHÍ thiệp, banner in (trị giá 20,000 vnđ).</p>
                <p><i class="fa-solid fa-check"></i>In logo/ảnh công ty/cá nhân lên banner</p>
                <p><i class="fa-solid fa-check"></i>Hỗ trợ Giao gấp trong 2 giờ</p>
                <p><i class="fa-solid fa-check"></i>Cần đặt hoa nhanh xin gọi:033578***</p>
                <p><i class="fa-solid fa-check"></i>Sản phẩm của chúng tôi luôn mang những ý nghĩa tốt đẹp nhất gửi tới
                    người nhận.</p>
                <p style="text-align: justify;"><i>Lưu ý: Đây là sản phẩm hoa tươi tự nhiên nên có thể có chút khác biệt
                        theo các mùa trong năm. Trường
                        hợp không đủ số lượng hoa như mẫu đã chọn, nhân viên tư vấn sẽ liên hệ với
                        Quý khách hàng để lựa chọn mẫu hoa thay thế phù hợp</i></p>

                <div class="row justify-content-start align-items-center p-0">
                    <div class="col-md-3 p-0">
                        {{-- href="{{ url("product/{$products->id}/AddCart") }}" --}}
                        <a onclick="AddCart({{ $products->id }})" href="javascript:" class="btn btn-secondary">Thêm Vào Giỏ
                            Hàng</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
   
    <div>
        <div class="container mt-5">
            {{-- <div class="row">
                <div class="col-md-4">
                    <div class="fb-comments">
                        <div class="card-header" style="margin:1rem">Hãy là người đầu tiên nhận xét “Cần một ai đó”
                        </div>
                        @foreach ($products['comment'] as $comment)
                            <div class="fb-comment">
                                <div class="fb-comment-avatar">
                                    <img src="{{ asset('storage/frontend/userProfile/' . $comment->user->avatar) }}"
                                        alt="Avatar">
                                </div>
                                <div class="fb-comment-content">
                                    <div class="fb-comment-author">
                                        <a href="#">{{ $comment->user->user_name }}</a>
                                    </div>
                                    <div class="fb-comment-text">{{ $comment->content }}</div>
                                </div>
                            </div>
                        @endforeach

                        <div class="fb-comment-view-more">
                            <button style="border:none; background:none" id="view-more-button">Xem thêm.....</button>
                        </div>

                        <div class="fb-comment-form">
                            <div class="fb-comment-avatar">
                                @foreach ($avatar as $items)
                                    <img src="{{ asset('storage/frontend/userProfile/' . $items['avatar']) }}"
                                        alt="Avatar">
                                @endforeach
                            </div>
                            <div class="fb-comment-content">
                                <form id="comment-form" method="post"
                                    action="{{ url("product/{$products->id}/details") }}">
                                    @csrf
                                    <textarea name="content" placeholder="Hãy viết gì đó..."></textarea>
                                    <button type="submit">Gửi</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> --}}

            <div class="row">
                <div class="col-md-4">
                    <div class="fb-comments">
                        <div class="card-header" style="margin:1rem">
                            Hãy là người đầu tiên nhận xét “Cần một ai đó”
                        </div>
                        @foreach ($products['comment'] as $comment)
                            @if (!$comment->parent_id)
                                <div class="fb-comment" style="align-items: flex-start">
                                    <div class="fb-comment-avatar">
                                        <img src="{{ asset('storage/frontend/userProfile/' . $comment->user->avatar) }}"
                                            alt="Avatar">
                                    </div>
                                    <div class="fb-comment-content">
                                        <div class="fb-comment-author">
                                            <a href="#">{{ $comment->user->user_name }}</a>
                                        </div>
                                        <div class="fb-comment-text">{{ $comment->content }}</div>
                                        @foreach ($products['comment'] as $reply)
                                            @if ($reply->parent_id == $comment->id)
                                                <div class="fb-comment-reply d-flex align-items-center">
                                                    <div class="fb-comment-avatar">
                                                        <div class="size-img">

                                                            <img src="{{ asset('storage/frontend/userProfile/' . $reply->user->avatar) }}"
                                                                alt="Avatar">
                                                        </div>
                                                    </div>
                                                    <div class="fb-comment-content">
                                                        <div class="fb-comment-author">
                                                            <a href="#"
                                                                style="font-size:0.7rem">{{ $reply->user->user_name }}</a>
                                                        </div>
                                                        <div class="fb-comment-text" style="font-size:0.7rem">
                                                            {{ $reply->content }}</div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                        <div class="fb-comment-reply">
                                            <a href="#" class="reply-link">Trả lời</a>
                                        </div>
                                        <div class="fb-comment-reply-form">
                                            <form id="reply-form-{{ $comment->id }}" class="reply-form" method="post"
                                                action="{{ url("product/{$products->id}/comment_replies") }}">
                                                @csrf
                                                <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                                <textarea name="content" id="content" placeholder="Hãy viết gì đó..."
                                                    class=" @error('user_name') is-invalid @enderror" required></textarea>
                                                @error('content')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <button type="submit">send</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <div class="fb-comment-view-more">
                            <button style="border:none; background:none" id="view-more-button">Xem thêm.....</button>
                        </div>
                        <div class="fb-comment-form">
                            <div class="fb-comment-avatar">
                                @foreach ($avatar as $items)
                                    <img src="{{ asset('storage/frontend/userProfile/' . $items['avatar']) }}"
                                        alt="Avatar">
                                @endforeach
                            </div>
                            {{-- <div class="fb-comment-content">
                                    <form id="comment-form" method="post"
                                        action="{{ url("product/{$products->id}/details") }}">
                                        @csrf
                                        <textarea name="content" placeholder="Hãy viết gì đó..."class=" @error('user_name') is-invalid @enderror" required ></textarea>
                                        @error('content')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <button type="submit">Gửi</button>
                                    </form>
                                </div> --}}
                            <div class="fb-comment-content">
                                <form id="comment-form" method="post"
                                    action="{{ url("product/{$products->id}/details") }}">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <textarea name="content" placeholder="Hãy viết gì đó..." class="form-control @error('user_name') is-invalid @enderror"
                                            required></textarea>
                                        @error('content')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">Gửi</button>
                                        </div>
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div>
                </div>




                {{-- <div class="col-md-4">
                    <div class="fb-comments">
                        <div class="card-header" style="margin:1rem">Hãy là người đầu tiên nhận xét “Cần một ai đó”
                        </div>
                        <!-- Recursive function to display comments as a tree -->
                        @foreach ($comments as $comment)
                            <div class="fb-comment">
                                <div class="fb-comment-avatar">
                                    <img src="{{ asset('storage/frontend/userProfile/' . $comment->user->avatar) }}"
                                        alt="Avatar">
                                </div>
                                <div class="fb-comment-content">
                                    <div class="fb-comment-author">
                                        <a href="#">{{ $comment->user->user_name }}</a>
                                    </div>
                                    <div class="fb-comment-text">{{ $comment->content }}</div>
                                    @if ($comment->replies->count() > 0)
                                        <div class="fb-comment-replies">
                                            @include('frontend.product.comments.replies', [
                                                'comments' => $comment->replies,
                                            ])
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                        <div class="fb-comment-view-more">
                            <button style="border:none; background:none" id="view-more-button">Xem thêm.....</button>
                        </div>

                        <div class="fb-comment-form">
                            <div class="fb-comment-avatar">
                                @foreach ($avatar as $items)
                                    <img src="{{ asset('storage/frontend/userProfile/' . $items['avatar']) }}"
                                        alt="Avatar">
                                @endforeach
                            </div>
                            <div class="fb-comment-content">
                                <form id="comment-form" method="post"
                                    action="{{ url("product/{$products->id}/details") }}">
                                    @csrf
                                    <textarea name="content" placeholder="Hãy viết gì đó..."></textarea>
                                    <button type="submit">Gửi</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> 


                <div class="col-md-8">

                    <div class="product-description">
                        <h2>Mô tả chi tiết sản phẩm</h2>
                        {!! $products->desc !!}

                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="container1">
        <h3 style="text-align:center">Sản Phẩm Tương Tự</h3>
        <div class="products-container">
            <div class="row">
                @foreach ($relatedProducts as $relatedProduct)
                    <div class="col-md-3">
                        {{-- @dd($relatedProduct) --}}
                        <a href="{{ url("product/{$relatedProduct['id']}/details") }}">
                            {{-- <a href="{{ route('product.detail', ['id' => $product['id']]) }}">View details</a> --}}

                            <div class="product" data-name="p-1">
                                @foreach ($relatedProduct->img as $images)
                                    {{-- @dd($product) --}}
                                    <img src="{{ asset('storage/backend/product/' . $images) }}"
                                        style="width:180px; height:180px" />
                                @endforeach
                                <h3>{{ $relatedProduct->name }}</h3>
                                <div class="price">{{ number_format($relatedProduct->price) }} <span>VN</span></div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
    </div>



    

    @include('frontend.layouts._footer')
    <script>
        const viewMoreButton = document.querySelector("#view-more-button");
        const hiddenComments = document.querySelectorAll(".fb-comment:nth-child(n+6)");

        let isHidden = true;

        viewMoreButton.addEventListener("click", function() {
            if (isHidden) {
                hiddenComments.forEach(comment => comment.style.display = "block");
                viewMoreButton.textContent = "Thu gọn";
            } else {
                hiddenComments.forEach(comment => comment.style.display = "none");
                viewMoreButton.textContent = "Xem thêm";
            }
            isHidden = !isHidden;
        });
    </script>
@endsection
<script>
    function AddCart(id) {
        $.ajax({
            url: '/product/AddCart/' + id,
            type: 'GET',

        }).done(function(response) {
            // console.log(response); 
            RenderCart(response);
            alertify.success('Success message');
        });
    }
    $("#data-cart").on("click", ".si-close i", function() {
        $.ajax({
            url: '/product/Delete-Item-Cart/' + $(this).data("id"),
            type: 'GET',
        }).done(function(response) {
            RenderCart(response);
            alertify.success('Đã xóa sản phẩm');
        });
    });

    function RenderCart(response) {
        $("#data-cart").empty();
        $("#data-cart").html(response);
        $("#total-quantity-show").text($("#total-quantity-cart").val());
        // console.log($("#total-quantity-cart").val());
    }
</script>
