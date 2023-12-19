@if (Session::has('Cart') != null)
    <div class="row">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">Tên</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Số lượng</th>
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
                                @foreach (json_decode(($item['productInfo']->img)) as $x => $image )
                                {{-- @dd($image) --}}
                                <div class="col-sm-2 hidden-xs">
                                    <img src="{{ asset('storage/backend/product/'. $image) }}" style="height:32px;width:39px" alt="">
                                </div>
                                @endforeach
                            </div>
                        </td>
                        <td> {{ $item['productInfo']->price }} x {{ $item['quantity'] }}</td>
                        <td class="si-close">
                            <i class="fa-solid fa-xmark" data-id="{{ $item['productInfo']->id }}"></i>
                        </td>
                        {{-- <td>xem</td> --}}
                    </tr>
                </tbody>
            @endforeach
            
            <tr>
                <td></td>
                {{-- <td class="text-center" ><a href="{{ url('product/shoping-cart') }}">Xem Giỏ Hàng</a></td> --}}
                <td></td>
                <td> Tổng:{{ number_format(Session::get('Cart')->totalPrice) }} VNĐ</td>
                <td></td>
            </tr>
            {{-- <table>
                <thead>

                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Tổng:{{ number_format(Session::get('Cart')->totalPrice) }} VNĐ</td>
                    </tr>
                </tbody>
            </table> --}}
        </table>
    </div>
    <div>
        {{-- @foreach (Session::get('Cart')->products as $item)
        <input hidden id="total-quantity-cart" type="number" value="{{ $item['quantity'] }}">
        @endforeach --}}
        {{-- <input hidden id="total-quantity-cart" type="number" value="{{ Session::get('Cart')->totalQuantity }}"> --}}

        <input hidden id="total-quantity-cart" type="number" value="{{ count(session('Cart')->products) }}">

    </div>
@endif
