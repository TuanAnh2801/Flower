@extends('frontend.layouts.app')
@section('content')
<div class="container" style="margin-top:5%;">
   
	<div class="row">
        <div class="jumbotron" style="box-shadow: 2px 2px 4px #000000;">
        <h2 class="text-center">ĐƠN ĐẶT HÀNG CỦA BẠN ĐÃ ĐƯỢC CẬP NHẬT</h2>
        <h3 class="text-center">Cảm ơn <i> <b> {{ $orderData['full_name'] }} </b> </i>  đã thanh toán</h3>
        
        <p class="text-center">Bạn Đã Thanh Toán $: {{ number_format($orderData['total_price'])  }}VND, hình thức thanh toán: {{ $payments->payment_type }}</p>
        <p class="text-center">
        Bạn sẽ nhận được một email xác nhận đơn đặt hàng với các chi tiết về đơn đặt hàng của bạn và một liên kết để theo dõi quá trình của bạn.</p>
        <div class="btn-group" style="margin-top:50px;">
            <a href="{{ url('product/history') }}" class="btn btn-lg btn-warning">CONTINUE</a>
        </div>
        </div>
	</div>

</div>
@endsection
