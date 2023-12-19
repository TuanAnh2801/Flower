<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Biên Lai Chuyển Khoản</title>
</head>
<style type="text/css">
    <style type="text/css">table {
        border-collapse: collapse;
        width: 100%;
    }

    table th,
    table td {
        border: 1px solid black;
        padding: 8px;
        text-align: center;
    }

    .container {
        margin: 0 auto;
        width: 80%;
    }

    .header {
        text-align: center;
    }

    .order-details {
        margin-top: 50px;
    }

    .order-items {
        margin-top: 50px;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-gap: 8px;
    }

    .payment-details {
        margin-top: 50px;
        margin-bottom: 50px;
    }

    .payment-details p:first-of-type {
        margin-top: 0;
    }

    .footer {
        text-align: center;
    }
</style>

<body>

    {{-- <h1>Xin chào {{ $orderData['full_name'] }}</h1>
    @if (Session::has('Cart') != null)
    <div class="col">
        <div class="cart-total">


            <p>

                <span>TỔng Số Lượng Sản Phẩm</span>

                <span>{{ Session::get('Cart')->totalQuantity }}</span>

            </p>
            <p><b>Gồm:</b></p>
            @foreach (Session::get('Cart')->products as $item)
            <p> {{ $item['productInfo']->name }}({{ $item['quantity'] }} sp) </p>
            @endforeach
           
            <p>Hình Thức Thanh Toán:{{$payments->payment_type}} </p>
           
            <p>

                <span>Tổng: </span>

                <span>{{ number_format(Session::get('Cart')->totalPrice) }}VNĐ </span>

            </p>

            <p>

            </p>

        </div>
@endif --}}
    <div class="container">
        <div class="header">
            <h1>Hóa đơn thanh toán</h1>
        </div>

        <div class="order-details">
            <h2>Chi tiết đơn hàng</h2>
            <table>
                <tr>
                    <td><strong>Mã đơn hàng:</strong></td>
                    <td>{{ $orderData['order_id'] }}</td>
                </tr>
                <tr>
                    <td><strong>Ngày đặt hàng:</strong></td>
                    <td>{{ $orderData['buy_at'] }}</td>
                </tr>
                <tr>
                    <td><strong>Khách hàng:</strong></td>
                    <td>{{ $orderData['full_name'] }}</td>
                </tr>
                <tr>
                    <td><strong>Điện thoại:</strong></td>
                    <td>{{ $orderData['telephone'] }}</td>
                </tr>
                <tr>
                    <td><strong>Email:</strong></td>
                    <td>{{ $orderData['email'] }}</td>
                </tr>
            </table>
        </div>

        <div class="order-items">
            <h2>Sản phẩm đặt hàng</h2>
            <table>
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Tổng cộng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (Session::get('Cart')->products as $item)
                        <tr>
                            <td>{{ $item['productInfo']->name }}</td>
                            <td style="text-align:right">{{ number_format($item['productInfo']->price) }}đ</td>
                            <td style="text-align: center">{{ $item['quantity'] }}</td>
                            <td style="text-align:right">
                                {{ number_format($item['quantity'] * $item['productInfo']->price) }} VNĐ</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <div class="payment-details">
            <h2>Thông tin thanh toán</h2>
            <table>
                <tr>
                    <td><strong>Phương thức thanh toán:</strong></td>
                    <td>{{ $payments->payment_type }}</td>
                </tr>
                <tr>
                    <td><strong>Tổng tiền:</strong></td>
                    <td>{{ number_format(Session::get('Cart')->totalPrice) }} VNĐ</td>
                </tr>
            </table>
        </div>

        <div class="footer">
            <p>Cảm ơn quý khách đã đặt hàng tại cửa hàng chúng tôi.</p>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>

</html>
