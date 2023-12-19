<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('frontend/css/slide.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('frontend/css/index.css') }}" rel="styleshzeet" type="text/css" media="all">
    <link href="{{ asset('frontend/css/detail.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('frontend/css/footer.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('frontend/css/shoping.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('frontend/css/showorder.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('frontend/css/profile.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('frontend/css/search.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('frontend/css/introduce.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('frontend/css/contract.css') }}" rel="stylesheet" type="text/css" media="all">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    {{-- script lỗi khi để ở bên dưới --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>

    @include('frontend.layouts._actract')
    @include('frontend.layouts._header')
    @include('frontend.layouts._nav')
    {{-- @include('frontend.layouts._slide') --}}
    @yield('content')
    {{-- @include('frontend.layouts._news') --}}
    {{-- @include('frontend.layouts._footer') --}}
    {{-- @yield('footer') --}}
    {{-- @include('frontend.layouts._product_feature') --}}
    {{-- @include('frontend.layouts._slide') --}}
    {{-- @include('frontend.layouts._footer') --}}

    {{-- đây là phần hiển thị thông báo mail của subcire --}}
    @if (session('login'))
        <div class="alert alert-info alert-dismissible fade show position-fixed bottom-0 end-0" role="alert">
            {{ session('login') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('email'))
        <div class="alert alert-primary alert-dismissible fade show position-fixed bottom-0 end-0" role="alert">
            {{ session('email') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{-- endsubcibe --}}
</body>
{{-- đây là phần hiển thị thông báo mail của subcire --}}

{{-- <script>
    // Tự động ẩn đoạn thông báo sau 5 giây
    setTimeout(function() {
        document.querySelector('.alert').classList.remove('show');
    }, 5000);
</script> --}}

<script>
    $(document).ready(function() {
        // Tự động ẩn đoạn thông báo sau 5 giây
        setTimeout(function() {
            $('.alert').removeClass('show');
        }, 5000);
    });
</script>

{{-- endsubcibe --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>


{{-- alertfify --}}

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

{{-- cart --}}
{{-- <script>
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
    </script> --}}
<script src="{{ asset('frontend/js/cart.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

{{-- <script src="{{ asset('frontend/js/search.js') }}"></script> --}}

</html>
