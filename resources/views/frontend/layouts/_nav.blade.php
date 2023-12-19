<div class="container">
    <style>
        .dropdown-menu {
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 2px 6px rgba(0, 0, 0, .1);
        }

        .dropdown-menu a {
            color: #333;
            font-size: 14px;
            padding: 8px 20px;
        }

        .dropdown-menu a:hover {
            background-color: #f5f5f5;
        }

        .login-menu .dropdown-toggle::after {
            display: none;
        }

        .login-menu .dropdown-menu {
            right: 0;
            left: auto;
            min-width: 140px;
        }

        .login-menu .dropdown-menu::before {
            content: "";
            position: absolute;
            top: -6px;
            right: 12px;
            border: 6px solid transparent;
            border-bottom-color: #fff;
        }

        .login-menu .dropdown-menu::after {
            content: "";
            position: absolute;
            top: -5px;
            right: 12px;
            border: 5px solid transparent;
            border-bottom-color: #ccc;
        }

        .login-menu.show .dropdown-menu {
            display: block;
            opacity: 1;
            transform: translateY(0);
            visibility: visible;
            transition: opacity 0.15s ease-in-out, transform 0.
        }
    </style>

    <div class="row align-items-md-center">



        <div id="logo_1" class="col-md-2 d-flex">
            <div>
                <button id="icon-menu" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling"
                    aria-controls="offcanvasScrolling"><i class="fa-solid fa-bars"></i></button>
                <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
                    id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                    <div class="offcanvas-header">
                        <h2>Menu</h2>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <div class="menu">

                            <ul class="navbar-nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/') }}">Trang Chủ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/showIntroduce') }}">Giới Thiệu</a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Danh Mục
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        @foreach ($categories as $category)
                                            <li class="d-flex flex-column"><a class="dropdown-item"
                                                    href="{{ route('frontend.category-product.index', $category->id) }}">{{ $category->name_category }}</a>
                                            </li>
                                        @endforeach
                                        <li class="d-flex flex-column"><a class="dropdown-item"
                                                href="{{ url('/') }}">Tất Cả</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('product/history') }}">Lịch Sử Mua</a>
                                </li>
                                <li><a href="{{ url('product/shoping-cart') }}">Giỏ Hàng Của bạn</a></li>
                                @if (Auth::check())
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="{{ asset('storage/frontend/userProfile/' . Auth::user()->avatar) }}"
                                                alt="" style="width:19px">
                                            <span style="color:rgb(10, 10, 10)">{{ Auth::user()->user_name }}</span>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <li><a class="dropdown-item" href="{{ url("user/profile") }}">Trang cá nhân</a></li>
                                            <li><a class="dropdown-item" href="{{ url('/logout') }}">Đăng xuất</a></li>
                                        </ul>
                                    </li>
                                @else
                                    <li><a href="{{ url('/showlogin') }}">Đăng nhập</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="logo">
                <img src="{{ asset('frontend/img/logo/png-image.png') }}" width="306px" alt="">
            </div>


        </div>
        <div class="col-md-10">
            <div class="title_text">
                <h1>"Shop hoa Thiên Đường - Điện là có - Có hoa thơm"</h1>
            </div>
        </div>
    </div>
</div>
<div class="header-main">
    <div class="header-wrapper">
        <div class="container" style="margin-right: 174px">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-3">
                    <div class="box">
                        <div class="container-4">
                            <form method="GET" action="{{ url('product/searchAll') }}">

                                <input type="search" id="search" name="search" placeholder="Search..." />
                                <button type="submit" class="icon"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="menu">
                        <ul>
                            <li><a href="{{ url('') }}">Trang Chủ</a> </li>
                            <li><a href="#latest-news" onclick="scrollToLatestNews()">Mẹo</a></li>
                            <li><a href="{{ url('showIntroduce') }}">Giới Thiệu</a> </li>
                            <div class="btn-group" style="padding:0">
                                {{-- <a class=" dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Danh Mục
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach ($categories as $category)
                                        <li>
                                            <a
                                                href='{{ route('frontend.category-product.index', $category->id) }}'>{{ $category->name_category }}</a>
                                        </li>
                                    @endforeach
                                    <li><a href="{{ url('/') }}">Tat Cả </a> </li>
                                </ul> --}}
                                <li class="nav-item dropdown nav nav-item">
                                    <a class="nav-item dropdown-toggle list-group-item list-group-item-action bg-transparent second-text fw-bold "
                                    id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Danh Mục</a>
                        
                        
                                    <ul class="ms-3 dropdown-menu" aria-labelledby="navbarDropdownMenuLink ml">
                                        {{-- <li><a class="dropdown-item" href="{{ url('admin/order/showOrder') }}">All Orders</a></li>
                                        <li><a class="dropdown-item" href="{{ url('admin/order/delivery') }}">Delivery All Orders</a></li> --}}
                                        @foreach ($categories as $category)
                                        
                                            <li>
                                                <a class="dropdown-item" href='{{ route('frontend.category-product.index', $category->id) }}'>{{ $category->name_category }}</a>
                                            </li>
                                        @endforeach
                                        <li><a class="dropdown-item" href="{{ url('index/login') }}">Tất cả</a></li>
                                    </ul>
                                </li>
                            </div>
                            <li><a href="{{ url('product/shoping-cart') }}">Giỏ Hàng Của bạn</a></li>


                        </ul>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
function scrollToLatestNews() {
  $('html, body').animate({
    scrollTop: $('#latest-news').offset().top
  }, 1000); // Thời gian cuộn 1 giây
}
</script>
