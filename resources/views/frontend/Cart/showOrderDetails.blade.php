@extends('frontend.layouts.app')
@section('content')
    <div class="order">
        <div class="header_success">
            <h1><i class="fa-regular fa-credit-card"></i></h1>
            <h4>Thanh Toán</h4>
            <p>Vui lòng kiểm tra thông tin Khách hàng, thông tin Giỏ hàng trước khi Đặt hàng</p>
        </div>
        <div class="container3">
            <form action="{{ url('product/updateOrder') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">

                    <div class="col">

                        <h3 class="title">billing address</h3>

                        <div class="inputBox">

                            <span>Tên : {{ $orderData['full_name'] }}</span>

                        </div>
                        <div class="inputBox">

                            <span>Địa Chỉ: {{ $orderData['address'] }} </span>

                        </div>
                        <div class="inputBox">
                            <span>Số Điện Thoại: {{ $orderData['telephone'] }}</span>

                        </div>
                        <div class="inputBox">
                            <span>Email: {{ $orderData['email'] }}</span>

                        </div>
                        <label for="">Hình Thức Thanh Toán:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="Tiền mặt" name="payment_type"
                                id="flexRadioDefault1"checked>
                            <label style="color:black" class="form-check-label" for="flexRadioDefault1">
                                Tiền mặt
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="Ngân Hàng" name="payment_type"
                                id="flexRadioDefault2">
                            <label style="color: black" class="form-check-label" for="flexRadioDefault2">
                                Ngân Hàng
                            </label>
                        </div>

                    </div>



                    @if (Session::has('Cart') != null)
                        <div class="col">
                            <div class="cart-total">


                                <p>

                                    <span>Số Lượng Sản Phẩm</span>

                                    <span>{{ Session::get('Cart')->totalQuantity }}</span>

                                </p>
                                <p>

                                    <span>Tổng: </span>

                                    <span>{{ number_format(Session::get('Cart')->totalPrice) }}VNĐ </span>

                                </p>

                                <p>

                                </p>

                            </div>
                    @endif

                </div>

        </div>

        <input type="submit" onclick="myFunction()" value="Đặt Hàng" class="submit-btn">
        </form>

    </div>
    <div class="container">
        <div id="note" class="row ">

            <p>Thay Đổi Thông Tin Vận Chuyển Xin Vui Lòng Án <a href="{{ url('user/profile') }}"><i style="color:red"
                        class="fa-solid fa-user-plus"></i></a> Hoặc Vào Trang Cá Nhân Để Cập Nhật</p>
        </div>
    </div>
    </div>
@endsection
<script>
    // function myFunction() {
    //     alert("Bạn Thanh Toán Thành Công");
    // }
    // function myFunction() {
    //     if (confirm("Bạn chắc chắn muốn thanh toán chưa?")) {
    //         alert("Bạn đã thanh toán thành công!");
    //     } else {
    //         event.preventDefault();
    //     }
    // }
    function myFunction() {
        if (confirm("Bạn chắc chắn thanh toán chưa?")) {
            alert("Bạn đã thanh toán thành công!");
            return true;
        } else {
            return false;
        }
    }
</script>