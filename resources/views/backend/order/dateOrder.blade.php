@extends('backend.authenticate.layouts.app')
@section('content')
    <form action="{{ url('admin/order/showOrder') }}" method="POST">
        @csrf
        <div class=" search-content-item d-flex">
            {{-- <div>
        <input id="myID" placeholder='Nhập Ngày'>
    </div> --}}
            {{-- <div class="col-auto">

                <input id="myID" name="date" class="form-control @error('date') is-invalid @enderror" required
                    placeholder="dates">
                @error('date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div> --}}
            <div class="col-auto">
                <input id="myID" name="date" class="form-control @error('date') is-invalid @enderror" type="date"
                    min="{{ date('Y-m-d') }}">
                @error('date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div><button type="submit" class="btn btn-success">Search</button></div>

        </div>
    </form>
    <div class="row my-5">
        {{-- @foreach ($products as $product)
        
        @endforeach
        --}}
        <h3 class="fs-4 mb-3">Orders</h3>

        <div class="col">
            <table class="table bg-white rounded shadow-sm  table-hover table-striped table-success ">
                <thead>
                    <tr>
                        <th scope="col" width="50">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Telephone</th>
                        <th scope="col">Product</th>
                        <th scope="col">Toatal_Price</th>
                        <th scope="col">Address</th>
                        <th scope="col">Status</th>
                        <th scope="col">Trading hours</th>
                        <th scope="col">Delete</th>


                    </tr>
                </thead>
                @foreach ($orders as $order)
                    {{-- @dd($order) --}}
                    {{-- @dd($order['user']) --}}
                    <tbody class="">
                        <tr>
                            <td scope="row">{{ ++$i }}</td>
                            <td>{{ $order->full_name }}</td>
                            <td>{{ $order->telephone }}</td>
                            <td>
                                {{-- @dd($order) --}}
                                @foreach ($order['OrderItems'] as $items)
                                    {{-- @dd($items['product_name']) --}}
                                    {{ $items['product_name'] }},
                                @endforeach
                            </td>
                            <td>{{ number_format($order['total_price']) }}VNĐ</td>

                            <td>
                                @if ($order['shopping'] != null)
                                    @foreach ($order['shopping'] as $items)
                                        {{ $items['address'] }},{{ $items['city'] }},{{ $items['country'] }}
                                    @endforeach
                                @else
                                @endif

                            </td>
                            <td>
                                {{-- <form action="{{ route('campaigns.approve', $order['id']) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" value="{{ $order['id'] }}" name="order_id">
                                    <input type="hidden" value="2" name="campaign_id">
                                    <input type="hidden" name="name" value="{{ $order['full_name'] }}">


                                    <input type="hidden" name="total_price" value="{{ $order['total_price'] }}">
                                    <input type="hidden" name="telephone" value="{{ $order['telephone'] }}">
                                    @foreach ($order['shopping'] as $items)
                                        <input type="hidden" name="address"
                                            value=" {{ $items['address'] }},{{ $items['city'] }},{{ $items['country'] }}">
                                    @endforeach
                                    <button
                                        class="btn @if ($order['campaign_id'] == 1) btn-outline-danger @else btn-success @endif"
                                        @if ($order['campaign_id'] != 1) disabled @endif>
                                        {{ $order['campaign_id'] == 1 ? 'Đợi Duyệt' : 'Đã Duyệt' }}
                                    </button>
                                </form> --}}
                                <form action="{{ route('campaigns.approve', $order['id']) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" value="{{ $order['id'] }}" name="order_id">
                                    <input type="hidden" value="2" name="campaign_id">
                                    <input type="hidden" name="name" value="{{ $order['full_name'] }}">

                                    {{-- <input type="hidden" name="product" @foreach ($order['order_items'] as $items) value="{{$items['product_name']}}" @endforeach> --}}

                                    {{-- @dd($order['total_price']) --}}
                                    <input type="hidden" name="total_price" value="{{ $order['total_price'] }}">
                                    <input type="hidden" name="telephone" value="{{ $order['telephone'] }}">
                                    @foreach ($order['shopping'] as $items)
                                        <input type="hidden" name="address"
                                            value=" {{ $items['address'] }},{{ $items['city'] }},{{ $items['country'] }}">
                                    @endforeach
                                    {{-- <button class="btn @if ($order['campaign_id'] == 1) btn btn-outline-danger @else btn-success @endif">{{ $order['campaign_id'] == 1 ? 'Đợi Duyệt' : 'Đã Duyệt' }}</button> --}}
                                    <button
                                        class="btn @if ($order['campaign_id'] == 1) btn-outline-danger @else btn-success @endif"
                                        @if ($order['campaign_id'] != 1) disabled @endif>
                                        {{ $order['campaign_id'] == 1 ? 'Đợi Duyệt' : ($order['campaign_id'] == 3 ? 'Đã Hủy' : 'Đã Duyệt') }}
                                    </button>
                                    {{-- <button class="btn btn-outline-danger" type="sumbit"> {{ $order['campaign']['status'] }}</button> --}}
                                </form>
                            </td>
                            <td>
                                {{ $order['buy_at'] }}
                            </td>

                            <td>



                                <a href="javascript:void(0)"
                                    onclick=" confirm('bạn có muốn xóa') && document.getElementById('delete-'+{{ $order['id'] }}).submit()"><i
                                        style="color: black" class="fas fa-trash"></i> </a>
                                <form id="delete-{{ $order['id'] }}" method="POST"
                                    action="{{ route('campaigns.delete', $order['id']) }}">
                                    @csrf
                                    @method('DELETE')

                                </form>
                            </td>
                            {{-- <td>
                            <a href="{{ url("admin/product/{$product->id}/edit") }}">sửa</a>


                            <a href="javascript:void(0)" onclick=" confirm('bạn có muốn xóa') && document.getElementById('delete-'+{{$product->id}}).submit()">xóa </a>
                            <form id="delete-{{$product->id}}" method="POST" action="{{url("admin/delete/{$product->id}")}}" >
                                @csrf
                                @method("DELETE")
                            
                            </form>
                        </td> --}}

                        </tr>

                    </tbody>
                @endforeach
            </table>

        </div>
    </div>
    @if (session('success'))
        <div class="alert alert-primary alert-dismissible fade show position-fixed bottom-0 end-0" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('date'))
        <div class="alert alert-primary alert-dismissible fade show position-fixed bottom-0 end-0" role="alert">
            {{ session('date') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('delete'))
        <div class="alert alert-primary alert-dismissible fade show position-fixed bottom-0 end-0" role="alert">
            {{ session('delete') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
@endsection
<script>
    // Tự động ẩn đoạn thông báo sau 5 giây
    setTimeout(function() {
        document.querySelector('.alert').classList.remove('show');
    }, 5000);
</script>
