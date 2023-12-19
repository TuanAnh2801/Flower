<!-- Sidebar -->
<div class="bg-white" id="sidebar-wrapper">
    <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">NO-FLower</div>
    <div class="list-group list-group-flush my-3">
        <a href="{{ url('admin/showDashboard') }}"
            class="list-group-item list-group-item-action bg-transparent second-text active"><i
                class="fas fa-tachometer-alt me-2"></i>Dashboard</a>

        {{-- <a href="{{ url('admin/account') }}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                class="fas fa-project-diagram me-2"></i>Account</a> --}}

        <li class="nav-item dropdown nav nav-item">
            <a class="nav-item dropdown-toggle list-group-item list-group-item-action bg-transparent second-text fw-bold "
                href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                aria-expanded="false"><i class="fas fa-project-diagram me-2"></i>Account</a>


            <ul class="ms-3 dropdown-menu" aria-labelledby="navbarDropdownMenuLink ml">
                <li><a class="dropdown-item" href="/admin/search/admin">Account Admin</a></li>
                <li><a class="dropdown-item" href="/admin/search/client">Account Client</a></li>
                <li><a class="dropdown-item" href="{{ url('admin/createAdmin') }}">Create Admin</a></li>
            </ul>
        </li>

        <li class="nav-item dropdown nav nav-item">
            <a class="nav-item dropdown-toggle list-group-item list-group-item-action bg-transparent second-text fw-bold "
                href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                aria-expanded="false"><i class="fas fa-gift me-2"></i>Products</a>


            <ul class="ms-3 dropdown-menu" aria-labelledby="navbarDropdownMenuLink ml">
                <li><a class="dropdown-item" href="{{ url('/admin/product/create') }}">Create Flower</a></li>
                <li><a class="dropdown-item" href="{{ url('/admin/product/all') }}">ALL</a></li>
                {{-- <li><a class="dropdown-item" href="{{ url('/admin/product/tet_flower') }}">Hoa Tet 2023</a></li>
                <li><a class="dropdown-item" href="{{ url('/admin/product/flower_wedding') }}">Hoa Cuoi</a></li>
                <li><a class="dropdown-item" href="{{ url('/admin/product/flower_birthday') }}">Hoa Sinh Nhat</a></li>
                <li><a class="dropdown-item" href="{{ url('/admin/product/flower_opeing') }} ">Hoa Khai Truong</a></li> --}}
                <li><a class="dropdown-item" href="{{ url('admin/showCategory') }} ">Create Categroy</a></li>
                <li><a class="dropdown-item" href="{{ url('admin/showAllCategory') }} ">Alls Categroy</a></li>
            </ul>
        </li>
        {{--                 
        <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                class="fas fa-chart-line me-2"></i>Products</a> --}}
        {{-- <a href="{{ url('admin/order/showOrder') }}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                class="fas fa-shopping-cart me-2"></i>Đơn</a> --}}

        <li class="nav-item dropdown nav nav-item">
            <a class="nav-item dropdown-toggle list-group-item list-group-item-action bg-transparent second-text fw-bold "
                href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                aria-expanded="false"><i class="fas fa-shopping-cart me-2"></i></i>Orders</a>


            <ul class="ms-3 dropdown-menu" aria-labelledby="navbarDropdownMenuLink ml">
                <li><a class="dropdown-item" href="{{ url('admin/order/showOrder') }}">All Orders</a></li>
                <li><a class="dropdown-item" href="{{ url('admin/order/delivery') }}">Delivery All Orders</a></li>

            </ul>
        </li>
        <a href="{{ url('admin/showSubcribe') }}"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                class="fas fa-paperclip me-2"></i>Subcribe</a>
        {{-- <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                class="fas fa-gift me-2"></i>Products</a> --}}
        <a href="{{ url('admin/feedback') }}"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold position-relative">
            <i class="fas fa-comment-dots me-2"></i>
            Feedback
            {{-- @if (isset($count) && $count > 0) --}}
            {{-- <span
                    class="badge bg-danger position-absolute top-0 start-100% translate-middle">{{ $count }}</span> --}}
            {{-- @endif --}}
        </a>
        <li class="nav-item dropdown nav nav-item">
            <a class="nav-item dropdown-toggle list-group-item list-group-item-action bg-transparent second-text fw-bold "
                href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                aria-expanded="false"><i class="fas fa-shopping-cart me-2"></i></i>Posts</a>


            <ul class="ms-3 dropdown-menu" aria-labelledby="navbarDropdownMenuLink ml">
                <li><a class="dropdown-item" href="{{ url('admin/posts/showCreatePost') }}">Create Posts</a></li>
                <li><a class="dropdown-item" href="{{ url('admin/post/allPosts') }}">All Posts</a></li>
                <li><a class="dropdown-item" href="{{ url('admin/posts/category') }}">Create CategoryPosts</a></li>
                <li><a class="dropdown-item" href="{{ url('admin/posts/allCategory') }}">All CategoryPosts</a></li>
                {{-- <li><a class="dropdown-item" href="{{ url('admin/order/delivery') }}">Delivery All Orders</a></li> --}}

            </ul>
        </li>
        {{-- <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                class="fas fa-map-marker-alt me-2"></i>Outlet</a> --}}
        <a href="{{ url('/logout1') }}"
            class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                class="fas fa-power-off me-2"></i>Logout</a>
    </div>
</div>
<!-- /#sidebar-wrapper -->

<!-- Page Content -->
