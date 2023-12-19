<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<div class="header">
    <div class="container">
        <div class="row " id="head">
            <div class="col-md-2">
                <div class="icons">
                    <a href="{{ url('https://www.facebook.com/PhamNangNghi/') }}"><i
                            class="fa-brands fa-facebook"></i></a>
                    <a href="{{ url('https://www.instagram.com/mathetesnghi/') }}"> <i
                            class="fa-brands fa-instagram"></i></a>
                    <a href="https://mail.google.com/mail/u/0/#inbox"> <i class="fa-sharp fa-solid fa-envelope"></i></a>
                    <a href="#!"><i class="fa-solid fa-phone"></i></a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="information">
                    <h6 data-bs-toggle="tooltip" data-bs-placement="bottom" title="anh@gmail.com"><i
                            class="fa-sharp fa-solid fa-envelopes-bulk"></i>anh@gmail.com</h6>
                    <h6 data-bs-toggle="tooltip" data-bs-placement="bottom" title="OPEN => 07:00-22:00" class="clock">
                        <i class="fa-regular fa-clock"></i>07:00-22:00
                    </h6>
                    <h6 data-bs-toggle="tooltip" data-bs-placement="bottom" title="Phone number: 0335780470"
                        class="phone"><i class="fa-solid fa-phone"></i><a style="color:aliceblue" href="tel:0335780470"
                            class="phone" onclick="callNumber(event)">0335780470</a>
                    </h6>


                    {{-- data-bs-toggle="tooltip" data-bs-placement="bottom" title="Adress: 190 Ngõ Quỳnh, Thanh Nhàn, Hà Nội" --}}
                    <div class="map">
                        <!-- Button trigger modal -->
                        <button type="button" class="adress" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <i data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Adress: 190 Ngõ Quỳnh Thanh Nhàn Hà Nội" class="fa-solid fa-location-dot"></i>
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">190 Ngõ Quỳnh,Thanh Nhàn,
                                            Hà Nôi </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.7863400456704!2d105.85327411488286!3d21.00120008601331!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac0b8001b895%3A0x994ddbbc99d974da!2zMTkwIE5nLiBRdeG7s25oLCBRdeG7s25oIEzDtGksIEhhaSBCw6AgVHLGsG5nLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1673537483965!5m2!1svi!2s"
                                            width="600" height="450" style="border:0;" allowfullscreen=""
                                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="login_cart">
                    <div class="login">

                        @if (Auth::check())
                            {{-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('storage/frontend/userProfile/' . Auth::user()->avatar) }}"
                                        alt="" style="width:19px"><span
                                        style="color:aliceblue">{{ Auth::user()->user_name }}</span>

                                   
                                </a>
                                <ul class="dropdown-menu p-0" style="width: 0cm; height:100px  "
                                    aria-labelledby="navbarDropdownMenuLink">
                                    <li class="p-0"><a class="dropdown-item p-0"
                                            href="{{ url('user/profile') }}">Trang Ca Nhan</a>
                                    </li>
                                    <li class="p-0"><a class="dropdown-item p-0"
                                            href="{{ url('product/history') }}">Lịch Sử</a>
                                    </li>
                                    <li class="p-0"><a class="dropdown-item p-0"
                                            href="{{ url('product/delivery') }}">Đơn Đang Giao</a>
                                    </li>
                                    <li class="p-0"><a class="dropdown-item p-0" href="{{ url('logout') }}">Dang
                                            Xuat</a></li>

                                </ul>
                            </li>
                             --}}

                            <li class="nav-item dropdown nav nav-item">
                                <a class="nav-item dropdown-toggle list-group-item list-group-item-action bg-transparent second-text fw-bold "
                                    href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false"><img
                                        src="{{ asset('storage/frontend/userProfile/' . Auth::user()->avatar) }}"
                                        alt="" style="width:19px"><span
                                        style="color:aliceblue">{{ Auth::user()->user_name }}</span></a>


                                <ul class="ms-3 dropdown-menu" aria-labelledby="navbarDropdownMenuLink ml">
                                    <li><a class="dropdown-item" href="{{ url('user/profile') }}">Trang Ca Nhan</a></li>
                                    <li><a class="dropdown-item" href="{{ url('product/history') }}">Lịch Sử</a></li>
                                    <li><a class="dropdown-item" href="{{ url('product/delivery') }}">Đơn Đang Giao</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ url('logout') }}">Đăng Xuất</a></li>

                                </ul>
                            </li>


                            {{-- <div class="toast show">
                    <div class="toast-header">
                      Toast Header
                      <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                    </div>
                    <div class="toast-body">
                      Some text inside the toast body
                    </div>
                  </div> --}}
                        @else
                            <!-- Button trigger modal -->
                            <button type="button" class="btn_login"
                                data-bs-toggle="modal"data-bs-target="#exampleModal">
                                <li><i class="fa-regular fa-user"></i>Đăng Nhập</li>
                            </button>
                        @endif
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content" id="form_login">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Đăng Nhập</h1>



                                        <button type="button" class="btn-close" id="exit"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" id="background_login">

                                        {{-- LOGIN --}}

                                        <form method="POST" action="{{ url('/login') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Email
                                                    address</label>
                                                <input type="email" name="email"
                                                    class="form-control  @error('email') is-invalid @enderror" required
                                                    id="email" aria-describedby="emailHelp">
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                                <input type="password" name="password"
                                                    class="form-control  @error('password') is-invalid @enderror"
                                                    required id="password">
                                                @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="mb-3 form-check">
                                                <div>

                                                    <input type="checkbox" id="remember_token"
                                                        class="form-check-input" value="remember_token"
                                                        name="remember_token" id="exampleCheck1">
                                                    <label class="form-check-label" for="exampleCheck1">Check me
                                                        out</label>
                                                </div>
                                                <div><a style="color:aliceblue"
                                                        href="{{ url('user/changePassword/showMail') }}"> Bạn Quên Mật
                                                        Khẩu</a>
                                                </div>
                                            </div>
                                            <button type="submit"
                                                style="background: greenyellow;     border-radius: 5px; padding:3px">login</button>
                                            <a style="color: rgb(165, 165, 153)" href="{{ url('/register') }}">Bạn
                                                chưa có tài khảo</a>
                                        </form>
                                        {{-- <form method="POST" action="{{ url('/login') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                                <input type="email"  name="email"
                                                    class="form-control  @error('email') is-invalid @enderror"
                                                    required id="email" aria-describedby="emailHelp">
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                                <input type="password" name="password"
                                                    class="form-control  @error('password') is-invalid @enderror"
                                                    id="password">
                                                @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="mb-3 form-check">
                                                <div>
                                                    <input type="checkbox" id="remember_token" class="form-check-input" name="remember_token" value="1"> <!-- Thay đổi ở đây -->
                                                    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                                                </div>
                                                <div><a style="color:aliceblue"
                                                        href="{{ url('user/changePassword/showMail') }}"> Bạn Quên Mật Khẩu</a>
                                                </div>
                                            </div>
                                            <button type="submit"
                                                style="background: greenyellow;     border-radius: 5px; padding:3px">login</button>
                                                <a style="color: rgb(165, 165, 153)" href="{{ url('/register') }}">Bạn
                                                    chưa có tài khảo</a>
                                            </form> --}}
                                        {{-- ENG LOGIN --}}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- Cart --}}
                    {{-- @if (Session::has('Cart') != null) --}}
                    <div class="dropdown">
                        <li class=" dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{-- Dropdown button --}}
                            @if (Session::has('Cart') != null)
                                <a class=" cart_text position-relative"data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="$:{{ Session('Cart')->totalPrice }}"><i
                                        class="fa-solid fa-cart-shopping"></i>
                                @else
                                    <a class=" cart_text position-relative"data-bs-toggle="tooltip"
                                        data-bs-placement="bottom"><i class="fa-solid fa-cart-shopping"></i>
                            @endif
                            @if (Session::has('Cart') != null)
                                <span id="total-quantity-show"
                                    style="font-size:7px"class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ count(session('Cart')->products) }}

                                    {{-- {{ session::get('Cart')->totalQuantity }} --}}
                                    {{-- tổng từng sản phẩm --}}
                                </span>
                            @else
                                <span id="total-quantity-show"
                                    style="font-size:7px"class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{-- {{ count(session('Cart')->products) }} --}}
                                    0
                                </span>
                            @endif
                            </a>
                        </li>
                        {{-- @endif --}}
                        {{-- cart shoping --}}
                        <div id="data-cart" class=" dropdown-menu">
                            @if (Session::has('Cart') != null)
                                <div class="row">
                                    <table class="table table-dark table-striped m-0">
                                        <thead>
                                            <tr>

                                                <th scope="col">Tên</th>
                                                <th scope="col">Ảnh</th>
                                                <th scope="col">Lượng</th>
                                                <th scope="col">Xóa</th>
                                            </tr>
                                        </thead>
                                        @foreach (Session::get('Cart')->products as $item)
                                            {{-- @dd($item['productInfo']->img) --}}
                                            <tbody>
                                                <tr>
                                                    <td> {{ $item['productInfo']->name }}</td>
                                                    <td>
                                                        <div class="">

                                                            @foreach (json_decode($item['productInfo']->img) as $x => $image)
                                                                {{-- @dd($image) --}}
                                                                <div class="col-sm-2 hidden-xs">
                                                                    <img src="{{ asset('storage/backend/product/' . $image) }}"
                                                                        style="height:39px;width:49px" alt="">

                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                    <td> {{ $item['productInfo']->price }} x {{ $item['quantity'] }}
                                                    </td>
                                                    <td class="si-close">
                                                        <i class="fa-solid fa-xmark"
                                                            data-id="{{ $item['productInfo']->id }}"></i>
                                                    </td>
                                                    {{-- <td>xem</td> --}}
                                                </tr>

                                            </tbody>
                                        @endforeach


                                        <tr>
                                            <td></td>
                                            {{-- <td class="text-center"><a href="{{ url('product/shoping-cart') }}">Xem
                                                    Giỏ Hàng</a></td> --}}
                                            <td></td>
                                            <td> Tổng:{{ number_format(Session::get('Cart')->totalPrice) }} VNĐ</td>
                                            <td></td>
                                        </tr>

                                    </table>
                                    {{-- <table>
                                        <thead>
                                            <tr>
                                                <th style="background: beige"><a style="color: blue"
                                                        href="{{ url('product/shoping-cart') }}">Thanh Toán</a></th>
                                                <th></th>
                                                <th style="background: beige">
                                                    Tổng:{{ number_format(Session::get('Cart')->totalPrice) }} VNĐ</th>
                                                <th style="background: beige"></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table> --}}

                                </div>
                            @endif
                        </div>
                        {{-- end cart? --}}
                    </div>
                </div>
                <div>
                    {{-- <li class=" cart_text position-relative"data-bs-toggle="tooltip" data-bs-placement="bottom"
                            title="$: {{ session('Cart')->totalPrice }}"><i class="fa-solid fa-cart-shopping"></i>Giỏ
                            Hàng
                            <span style="font-size:7px"
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ count(session('Cart')->products) }}

                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </li> --}}
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<script>
    //bosstrap %toasts
    //tooltip
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>

<script>
    function callNumber(event) {
        event.preventDefault();
        const phoneNumber = event.target.getAttribute('href');
        window.location.href = `tel:${phoneNumber}`;
    }
</script>
