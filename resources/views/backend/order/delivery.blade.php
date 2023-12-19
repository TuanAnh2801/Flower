@extends('backend.authenticate.layouts.app')
@section('content')
<form action="{{ url("admin/order/dateDelivery") }}" method="POST">
    @csrf
<div class=" search-content-item d-flex">
    {{-- <div>
        <input id="myID" placeholder='Nhập Ngày'>
    </div> --}}
        <div class="col-auto">
            {{-- <label for="inputPassword2" class="visually-hidden">Password</label> --}}
            <input id="myID" name="date" class="form-control" placeholder="Dates">
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
                    <th scope="col">Toatal_Price</th>
                    <th scope="col">Address</th>


                </tr>
            </thead>
            @foreach ($orders as $order)
                {{-- @dd($order) --}}
                {{-- @dd($order['user']) --}}
                <tbody class="">
                    <tr>
                        <th scope="row">{{ ++$i }}</th>
                        <td>{{ $order['name'] }}</td>
                        <td>{{ $order['telephone'] }}</td>
                        <td>{{ number_format($order['total_price']) }}VNĐ</td>

                       
                        <td>
                            {{ $order['address'] }}
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
        {{ $orders->links() }}
    </div>
</div>
@endsection
