@extends('frontend.layouts.app')
@section('content')
    @include('frontend.layouts._slide')
    <div class="container">

        {{-- <div class="row"> --}}
        @include('frontend.layouts._filter_left')
        {{-- @include('frontend.layouts._filter_right') --}}


        {{-- </div> --}}
    </div>
    {{-- @include('frontend.layouts._filter_left')
        @include('frontend.layouts._filter_right') --}}
    {{-- <div class="container1">
                <h3 style="text-align:center">Sản Phẩm</h3>
      

        <div class="products-container">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-3">
                        <a href="{{ url("product/{$product->id}/details") }}">
                            <div class="product" data-name="p-1">
                                @foreach ($product->img as $images)
                                
                                    <img src="{{ asset('storage/backend/product/' . $images) }}"
                                        style="width:180px; height:180px" />
                                @endforeach
                                <h3>{{ $product->name }}</h3>
                                <div class="price">{{ number_format($product->price) }} <span>VN</span></div>
                            </div>
                        </a>
                    </div>
                @endforeach
                {{ $products->links() }}
            </div>
        </div>
    </div> --}}
    <div class="container1">
        <h3 style="text-align:center">Sản Phẩm</h3>
        <div class="products-container">
            <div class="row">
                @if (count($products) == 0)
                    <div class="col-md-12">
                        <p class="not-found-message" style="text-align: center;font-size: 18px"> <span class="fa fa-search"></span> Không tìm thấy sản phẩm.</p>
                    </div>
                @else
                    @foreach ($products as $product)
                        <div class="col-md-3">
                            <a href="{{ url("product/{$product->id}/details") }}">
                                <div class="product" data-name="p-1">
                                    @foreach ($product->img as $images)
                                        <img src="{{ asset('storage/backend/product/' . $images) }}"
                                            style="width:180px; height:180px" />
                                    @endforeach
                                    <h3>{{ $product->name }}</h3>
                                    <div class="price">{{ number_format($product->price) }} <span>VN</span></div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    {{ $products->links() }}
                @endif
            </div>
        </div>
    </div>
    <div class="container1">
        <h3 style="text-align:center">Sản Phẩm Nổi Bật</h3>
        <div class="products-container">
            <div class="row">
                @foreach ($popularProducts as $popularProduct)
                    <div class="col-md-3">
                        <a href="{{ url("product/{$popularProduct->id}/details") }}">
                            <div class="product" data-name="p-1">
                                @foreach ($popularProduct->img as $images)
                                    {{-- @dd($product) --}}
                                    <img src="{{ asset('storage/backend/product/' . $images) }}"
                                        style="width:180px; height:180px" />
                                @endforeach
                                <h3>{{ $popularProduct->name }}</h3>
                                <div class="price">{{ number_format($popularProduct->price) }} <span>VN</span></div>
                            </div>
                        </a>
                    </div>
                @endforeach
                {{-- {{ $popularProducts->links() }} --}}
            </div>
        </div>

    </div>
    @include('frontend.layouts._news')
    @include('frontend.layouts._footer')

@endsection
