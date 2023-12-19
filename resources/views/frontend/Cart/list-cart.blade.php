
<style>
    Hiển thị bảng theo cột trên màn hình nhỏ hơn 768px
    @media only screen and (max-width: 768px) {

        #cart {
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }

        #cart th,
        #cart td {
            display: inline-block;
            border: none;
            text-align: left;
            width: 100%;
        }

        #cart th {
            font-weight: bold;
            background-color: #f5f5f5;
            text-transform: uppercase;
        }

        #cart td {
            border-bottom: 1px solid #ddd;
            padding: 8px 16px;
        }

        #cart td:before {
            content: attr(data-th) ": ";
            font-weight: bold;
            width: 6.5em;
            display: inline-block;
            color: #555;
        }
    }
</style>

@if (Session::has('Cart') != null)
    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:35%">Tên sản phẩm</th>
                <th style="width:10%"class="text-center">Giá</th>
                <th style="width:8%"class="text-center">Số lượng</th>
                <th style="width:22%" class="text-center">Thành tiền</th>
                <th style="width:5%">Lưu</th>
                <th style="width:5%">Xóa</th>

            </tr>
        </thead>
        <tbody>
            @foreach (Session::get('Cart')->products as $item)
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-2 hidden-xs">
                                {{-- <img src="public/frontend/storage/product/{{ $item['productInfo']->img }}"alt="Sản phẩm 1"
                                    class="img-responsive" width="100"> --}}
                                @foreach (json_decode($item['productInfo']->img) as $x => $image)
                                    {{-- @dd($image) --}}
                                    <div class="col-sm-2 hidden-xs">
                                        <img src="{{ asset('storage/backend/product/' . $image) }}"
                                            style="height:80px;width:80px" alt="">
                                    </div>
                                @endforeach

                            </div>
                            <div class="col-sm-10">
                                <h4 class="nomargin" style="margin-left: 30px"> {{ $item['productInfo']->name }}</h4>
                                {{-- <p>{{ $item['productInfo']->desc }}</p> --}}
                            </div>
                        </div>

                    </td>

                    <td data-th="Price">{{ number_format($item['productInfo']->price) }}VNĐ</td>
                    <td class="quanity_number" data-th="Quantity"><input class=" form-control text-center"
                            value="{{ $item['quantity'] }}" type="number">
                    </td>

                    <td data-th="Subtotal" class="text-center"> {{ number_format($item['price']) }} VNĐ </td>
                    <td class="actions" data-th="">

                        <button class="btn btn-danger btn-sm"><i id="ti-save" class="fa-solid fa-floppy-disk"></i>
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-dark btn-sm"><i id="ti-close" class="fa-regular fa-trash-can"
                                onclick="DeleteListItemCart({{ $item['productInfo']->id }})"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="visible-xs">
                <td colspan="3.5" class="hidden-xs"> </td>
                <td class="text-center"> <strong>Tổng:
                        {{ number_format(session::get('Cart')->totalPrice) }}</strong>
                </td>
            </tr>
            <tr>
                <td><a href="/" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục
                        mua hàng</a>
                </td>
                <td colspan="2" class="hidden-xs"> </td>
                <td class="hidden-xs text-center">
                    <strong>{{ number_format(session::get('Cart')->totalQuantity) }} Sản Phẩm</strong> <br>
                    <strong>Tổng tiền: {{ number_format(session::get('Cart')->totalPrice) }}VNĐ</strong>
                </td>

                <td><a id="button_size" href="{{ url('product/showOrderDetails') }}"
                        class="btn btn-success btn-block">Thanh toán <i class="fa fa-angle-right"></i></a>
                </td>
                <td colspan="2" class="hidden-xs"> </td>
            </tr>

        </tfoot>
    </table>
@endif
