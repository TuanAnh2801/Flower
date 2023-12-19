@extends('frontend.layouts.app')
@section('content')
    {{-- @dd($orders)
@if ($orders['delivery'] != null) --}}
    <style>
        /* Default style for table */
        .table {
            width: 100%;
            margin: 0 auto;
        }

        /* Style for mobile devices */
        @media only screen and (max-width: 767px) {
            .table {
                font-size: 12px;
            }

            .table th,
            .table td {
                padding: 5px;
            }
        }

        /* Style for tablets and desktops */
        @media only screen and (min-width: 768px) {
            .table {
                width: 67%;
            }
        }
    </style>
    {{-- <div class="container">

        <table class="table table-bordered mt-4" style="    width: 67%; margin: auto">
            <thead>
                <tr>

                    <th class="text-center" scope="col-0.5">Tên</th>
                    <th class="text-center" scope="col">Số Điện Thoại</th>
                    <th class="text-center" scope="col">Tiền Thanh Toán</th>

                    <th class="text-center" scope="col">Địa Chỉ Giao Hàng</th>
                    <th class="text-center"scope="col">Trạng Thái</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($orders as $order)
                

                    @foreach ($order['delivery'] as $x => $items)
                        <tr>
                          
                            <td class="text-center">{{ $items['name'] }}</td>
                            <td style="text-align:right">{{ $items['telephone'] }}</td>

                            <td style="text-align:right">{{ number_format($items['total_price']) }}VNĐ</td>
                           
                            <td class="text-center">{{ $items['address'] }}</td>
                            <td><a href="#!"class=" btn btn-outline-danger">Đang Giao</a></td>
                        </tr>
                    @endforeach
                @endforeach

            </tbody>
        </table>
        {{ $orders->links() }}
    </div> --}}
    <div class="container">
        <table class="table table-bordered mt-4" style="width: 67%; margin: auto">
            <thead>
                <tr>
                    <th class="text-center" scope="col-0.5">Tên</th>
                    <th class="text-center" scope="col">Số Điện Thoại</th>
                    <th class="text-center" scope="col">Tiền Thanh Toán</th>
                    <th class="text-center" scope="col">Địa Chỉ Giao Hàng</th>
                    <th class="text-center" scope="col">Trạng Thái</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    {{-- Kiểm tra nếu mảng delivery có phần tử --}}
                    @if (count($order['delivery']) > 0)
                        @foreach ($order['delivery'] as $x => $items)
                            <tr>
                                <td class="text-center">{{ $items['name'] }}</td>
                                <td style="text-align:right">{{ $items['telephone'] }}</td>
                                <td style="text-align:right">{{ number_format($items['total_price']) }}VNĐ</td>
                                <td class="text-center">{{ $items['address'] }}</td>
                                <td><a href="#!" class="btn btn-outline-danger">Đang Giao</a></td>
                            </tr>
                        @endforeach
                    @endif
                @endforeach
            </tbody>
        </table>
        {{ $orders->links() }}
    </div>
    {{-- @else
<div class="container">
    <div id="icon_null">
        <img src="{{ asset('frontend/img/icon/awm1610688013.jpg') }}" alt="">
        <h1>Trống!</h1>

    </div>
</div>
@endif --}}
@endsection
