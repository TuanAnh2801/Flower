@extends('frontend.layouts.app')
@section('content')
    <style>
        table {
            width: 100%;
        }

        /* Thu gọn bảng khi trang web được xem trên điện thoại */
        @media (max-width: 768px) {
            table {
                width: 100%;
            }
        }
    </style>
    @if ($userOrders != null)
        <div class="container">

            <table class="table table-bordered mt-4" style="    width: 67%; margin: auto">
                <thead>
                    <tr>

                        <th class="text-center" scope="col-0.5">Tên</th>
                        <th class="text-center" scope="col">Số Điện Thoại</th>
                        <th class="text-center" scope="col">Sản Phẩm</th>
                        <th class="text-center" scope="col">Tiền Thanh Toán</th>
                        <th class="text-center "scope="col">Trạng Thái</th>
                        <th class="text-center" scope="col">Giờ</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($userOrders as $userOrder)
                        <tr>

                            <td class="text-center">{{ $userOrder['full_name'] }}</td>
                            <td style="text-align:right">{{ $userOrder['telephone'] }}</td>
                            <td style="text-align:center">


                                @foreach ($userOrder['OrderItems'] as $item)
                                    {{ $item['product_name'] }}({{ $item['product_quantity'] }}),
                                @endforeach
                            </td>
                            <td style="text-align:right">{{ number_format($userOrder['total_price']) }}VNĐ</td>

                            <td class="d-flex justify-content-center">
                                @if ($userOrder['campaign_id'] == 1)
                                    @php
                                        $now = now();
                                        $created = \Carbon\Carbon::parse($userOrder['created_at']);
                                        $diff = $now->diffInMinutes($created);
                                    @endphp
                                    @if ($diff <= 60)
                                        <form action="{{ route('campaign.history', $userOrder['id']) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" value="3" name="campaign_id">
                                            <button style="position: unset" type="submit" class="btn btn-danger">Hủy
                                                Đơn</button>
                                        </form>
                                        {{-- @endif --}}
                                    @elseif ($userOrder['campaign_id'] == 1)
                                        <button style="position: unset" type="button" class="btn btn-success">Đợi
                                            Duyệt</button>
                                    @endif
                                @elseif ($userOrder['campaign_id'] == 2)
                                    <button style="position: unset" type="button" class="btn btn-success">Đã Duyệt</button>
                                @elseif ($userOrder['campaign_id'] == 3)
                                    <span style="position: unset" class="btn btn-outline-danger">Đã hủy</span>
                                @endif
                            </td>



                            <td class="text-center">{{ $userOrder['buy_at'] }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <p style="text-align: center;">! Lưu ý bạn có thể hủy đơn hàng trong vòng 1 giờ. </br> Nếu đã được duyệt bạn
                muốn hủy xin vui lòng liên hệ với shop qua số điện thoại 0335780470 hoặc qua <a href="{{ url("https://zalo.me/0335780470") }}">Zalo</a> cửa hàng</p>
            {{ $userOrders->links() }}
        </div>
    @else
        <div class="container">
            <div id="icon_null">
                <img src="{{ asset('frontend/img/icon/awm1610688013.jpg') }}" alt="">
                <h1>Bạn chưa có thanh toán 1 giao dịch nào!</h1>

            </div>
        </div>
    @endif

    @if (session('cancelOrder'))
        <div class="alert alert-primary alert-dismissible fade show position-fixed bottom-0 end-0" role="alert">
            {{ session('cancelOrder') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
@endsection
<script>
    setTimeout(function() {
        document.querySelector('.alert').classList.remove('show');
    }, 5000);
</script>
