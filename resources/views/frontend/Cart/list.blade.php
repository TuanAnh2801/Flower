@extends('frontend.layouts.app')
@section('content')


    <style>
        /* Hiển thị bảng theo cột trên màn hình nhỏ hơn 768px */
        @media only screen and (max-width: 768px) {

            /* Các quy tắc CSS để hiển thị bảng theo cột */
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

    <div class="container">
        <div id="list-cart">
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
                            {{-- @dd(json_decode(($item['productInfo']->img))) --}}
                            <tr>
                                <td data-th="Product">
                                    <div class="row">
                                        @foreach (json_decode($item['productInfo']->img) as $x => $image)
                                            {{-- @dd($image) --}}
                                            <div class="col-sm-2 hidden-xs">
                                                <img src="{{ asset('storage/backend/product/' . $image) }}"
                                                    style="height:80px;width:80px" alt="">
                                            </div>
                                        @endforeach

                                        <div class="col-sm-10">
                                            <h4 class="nomargin" style="margin-left: 30px"> {{ $item['productInfo']->name }}
                                            </h4>
                                            {{-- <p>{{ $item['productInfo']->desc }}</p> --}}
                                        </div>
                                    </div>

                                </td>

                                <td data-th="Price">{{ number_format($item['productInfo']->price) }}VNĐ</td>
                                <td class="quanity_number" data-th="Quantity">
                                    <input id="quantity-item-{{ $item['productInfo']->id }}"
                                        class=" form-control text-center" value="{{ $item['quantity'] }}" type="number">
                                </td>

                                <td data-th="Subtotal" class="text-center"> {{ number_format($item['price']) }} VNĐ </td>
                                <td class="actions" data-th="">

                                    <button class="btn btn-danger btn-sm">
                                        <i id="ti-save" class="fa-solid fa-floppy-disk"
                                            onclick="SaveListItemCart({{ $item['productInfo']->id }})"></i>
                                    </button>
                                </td>
                                <td>
                                    <button class="btn btn-dark btn-sm">
                                        <i id="ti-close" class="fa-regular fa-trash-can"
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
                                    {{ number_format(session::get('Cart')->totalPrice) }}VNĐ</strong>
                            <td colspan="2.6" class="hidden-xs"> </td>

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
        </div>
    </div>
@else
    <div class="container">
        <div id="icon_null">
            <img src="{{ asset('frontend/img/icon/awm1610688013.jpg') }}" alt="">
            <h1>Giỏ Hàng Trống Rồi!</h1>

        </div>
        @endif
        <script>
            function DeleteListItemCart(id) {
                console.log(id);
                $.ajax({
                    url: '/product/Delete-List-Item-Cart/' + id,
                    type: 'GET',

                }).done(function(response) {
                    console.log(response);
                    RenderListCart(response);
                    alertify.success('Xóa Giỏ Thành Công');
                });

            }

            function SaveListItemCart(id) {
                // console.log( $("#quantity-item-" +id).val());
                // $("#quantity-item-" +id).val()
                $.ajax({
                    url: '/product/Save-List-Item-Cart/' + id + '/' + $("#quantity-item-" + id).val(),
                    type: 'GET',

                }).done(function(response) {
                    console.log(response);
                    RenderListCart(response);
                    alertify.success('Đã Cập Nhật Sản Phẩm');
                });

            }

            function RenderListCart(response) {
                $("#list-cart").empty();
                $("#list-cart").html(response);
            }
        </script>
    @endsection
