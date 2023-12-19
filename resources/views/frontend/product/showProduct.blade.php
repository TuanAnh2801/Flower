@if ($newCar = !null)

    <p>ok</p>
@else
    // class Cart{
    // public $products = null;
    // public $totalPrice = 0;
    // public $totalQuantity = 0;

    // public function __construct($cart)
    // {
    // if($cart){
    // $this->products = $cart->products;
    // $this->totalPrice = $cart->totalPrice;
    // $this->totalQuantity = $cart->totalQuantity;
    // }
    // }
    // public function AddCart($product , $id)
    // {
    // $newProduct = ['quantity' => 0 ,
    // 'price'=>$product->price,
    // 'productInfo' => $product,
    // ];
    // if($this->products)
    // {
    // if(array_key_exists($id, $this->products)){
    // $newProduct =$this->products[$id];
    // }
    // }
    // $newProduct['quantity']++;
    // $newProduct['price'] = $newProduct['quantity']*$product->price;
    // $this->totalPrice += $newProduct['price'];
    // $this->totalQuantity ++;
    // }
    // }
    <div class="dropdown">
        <li data-toggle="dropdown">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Giỏ Hàng <span
                class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
        </li>

        <div class="dropdown-menu">
            <div class="row total-header-section">
                @php $total = 0 @endphp
                @foreach ((array) session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
                @endforeach
                <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                    <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                </div>
            </div>
            @if (session('cart'))
                @foreach (session('cart') as $id => $details)
                    @dd($details)
                    <div class="row cart-detail">
                        <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                            @foreach ($details as $detail)
                                @dd($details)
                                <img src="{{ $details['img'] }}" alt="">
                            @endforeach
                            @foreach ($products->img as $images)
                                <img src="{{ asset('storage/backend/product/' . $images) }}"
                                    style="width:180px; height:180px" />
                            @endforeach
                            <img src="{{ asset('storage/backend/product') }}/{{ $details['img'] }}" alt="">
                        </div>
                        <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                            <p>{{ $details['name'] }}</p>
                            <span class="price text-info"> ${{ $details['price'] }}</span> <span class="count">
                                Quantity:{{ $details['quantity'] }}</span>
                        </div>
                    </div>
                @endforeach
            @endif
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                    <a href="" class="btn btn-primary btn-block">View all</a>
                </div>
            </div>
        </div>
    </div>
