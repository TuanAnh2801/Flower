<?php

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use App\Mail\OrderDetailsMail;
use App\Models\Campaign;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Product;
use App\Models\Shopping;
use App\Models\User;
use App\Models\UserPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function AddCart(Request $request, $id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        // $product = Product::find($id);

        if ($product != null) {
            $oldCart = session('Cart') ? session('Cart') : null;

            $newCart = new Cart($oldCart);
            $newCart->AddCart($product, $id);
            // $request->session()->put('Cart',$newCart);
            session(['Cart' => $newCart]);
            // dd($newCart);

        }
        return view('frontend.Cart.cart');
        // $product = Product::find($id);
        // if($product != null)
        // {
        //     $oldCart = session('Cart') ? session('Cart') : null;
        //     $newCart = new Cart($oldCart);
        //     $newCart->AddCart($product, $id);
        //     $request->session()->put('Cart', $newCart);
        //     dd($newCart);
        // }
    }
    public function DeleteItemCart(Request $request, $id)
    {
        $oldCart = session('Cart');
        $newCart = new Cart($oldCart);
        $newCart->DeleteItemCart($id);
        if (count($newCart->products) > 0) {
            session(['Cart' => $newCart]);
        } else {
            Session::forget('Cart');
        }
        return view('frontend.Cart.cart');
    }
    public function showShoping()

    {
        // $product = DB::table('products')->where('id', $id)->first();

        // if($product != null){
        //     $oldCart = session('Cart') ? session('Cart') : null;

        //     $newCart = new Cart($oldCart);
        //     $newCart->AddCart($product, $id);
        //     // $request->session()->put('Cart',$newCart);
        //     session(['Cart' => $newCart]);
        //     // dd($newCart);
        // }
        $categories = Category::all();
        return view('frontend.Cart.list', compact('categories'));
    }
    public function DeleteListItemCart(Request $request, $id)
    {
        $oldCart = session('Cart');
        $newCart = new Cart($oldCart);
        $newCart->DeleteItemCart($id);
        if (count($newCart->products) > 0) {
            session(['Cart' => $newCart]);
        } else {
            Session::forget('Cart');
        }
        return view('frontend.Cart.list-cart');
    }
    public function SaveListItemCart(Request $request, $id, $quantity)
    {
        $oldCart = session('Cart');
        $newCart = new Cart($oldCart);
        $newCart->UpdateItemCart($id, $quantity);
        session(['Cart' => $newCart]);
        return view('frontend.Cart.list-cart');
    }

    public function showOrderDetails()
    {

        $orderData = [
            'total_price' => session('Cart')->totalPrice,
            'full_name' => Auth::user()->first_name . ' ' . Auth::user()->last_name,
            'address' => Auth::user()->userAddress->address . ', ' . Auth::user()->userAddress->city . ',' . Auth::user()->userAddress->country,
            'telephone' => Auth::user()->telephone,
            'email' => Auth::user()->email
        ];
        // dd($orderData);
        //category
        $categories = Category::all();

        return view('frontend.Cart.showOrderDetails', compact('orderData', 'categories'));
    }
    public function updateOrder(Request $request)
    {

        $orderData = [
            'total_price' => session('Cart')->totalPrice,
            'order_id' => Auth::user()->id,
            'full_name' => Auth::user()->first_name . ' ' . Auth::user()->last_name,
            'telephone' => Auth::user()->telephone,
            'email' => Auth::user()->email,
            'campaign_id' => 1
        ];
        // // dd($orderData);
        // // dd( Auth::user()->id);
        $order = Order::create($orderData);

        $orderItems = array_map(function ($item) use ($order) {
            return [
                'order_id' => $order->id,
                'product_name' => $item['productInfo']->name,
                'product_quantity' => $item['quantity'],
                'product_price' => $item['price'],
            ];
        }, session('Cart')->products);
        // // dd($orderItems);
        OrderItems::insert($orderItems);

        $shippingData = [
            'order_id' => $order->id,
            'customer_name' => Auth::user()->first_name . ' ' . Auth::user()->last_name,
            'telephone' => Auth::user()->telephone,
            'address' =>  Auth::user()->userAddress->address,
            'city' =>  Auth::user()->userAddress->city,
            'country' => Auth::user()->userAddress->country,

        ];

        $shipping = Shopping::create($shippingData);

        $payment = [
            'user_id' => Auth::user()->id,

            'payment_type' =>  $request->input('payment_type'),
        ];
        // dd($payment);
        // dd($payments->payment_type);
        UserPayment::create($payment);
        $user = Auth::user();
        // $payments = UserPayment::where('user_id',$user->id);
        $payments = DB::table('user_payment')->where('user_id', $user->id)->latest()->first();
        // dd($payments);
        // $payments = UserPayment::with('user')->findOrFail($id);
        // dd($payments); 
        // $id = User::find($request->get('id'));
        // dd($id);
        // UserPayment::create($request->input());

        // $name ='Phạm Năng Nghi';
        // Mail::send('frontend.email.test',compact('name'),function($email)use($name){
        //     $email->subject('demo');
        //     $email->to('mathetesnghi@gmail.com',$name);
        // });
        if ($shipping) {
            $user = Order::findOrFail($order->id);
            //     // dd($user);
            Mail::to($user->email)->send(new OrderDetailsMail($user));
            //     // return redirect('')
        }
        $categories = Category::all();
        return view('frontend.Cart.paymentSuccess', compact('orderData', 'payments', 'categories'));
    }
    public function history()
    {
        // $userOrders=Order::all();
        // dd($order);
        // $User_Order= Order::with('user')->get()->toArray();
        $userOrders =  Order::with('OrderItems')->with('campaign')->where('order_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(5);
        //    dd($userOrders);
        //    $user_Orders =  Order::with('user')->get();
        // $order= Order::all();
        // $order_user = $order->load('user');
        // dd( $order_user );
        // $order_campagin = $userOrders->load('campaign');
        // $Order_Campaign= Order::with('campaign')->where('order_id',Auth::user()->id)->orderBy('id','desc')->get();
        // dd($userOrders);

        //catefories
        $categories = Category::all();
        return view('frontend.Cart.userOrder', compact('userOrders', 'categories'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function updateHistory(Request $request, $id)
    {
        //    dd($request->input());
        $orders = Order::find($id);
        // dd($order);
        // $order= $orders->update($request->input('campaign_id'));
        // $orders->campaign_id = 2;
        $orders->campaign_id = $request->input('campaign_id');
        $orders->save();
        // $categories= Category::all();
        return redirect()->back()->with('cancelOrder', 'Bạn Đã Hủy Đơn Hàng');
    }
    // public function delivery()
    // {
    //     $orders = Order::with('delivery')->where('order_id',Auth::user()->id)->orderBy('id','desc')->paginate(5);
    //     $categories= Category::all();
    //     return view('frontend.Cart.userDelivery', compact('orders','categories'))->with('i',(request()->input('page',1)-1)*5);

    // }
    public function delivery()
    {
        $orders = Order::with('delivery')->where('order_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(5);
        $categories = Category::all();
        return view('frontend.Cart.userDelivery', compact('orders', 'categories'))->with('i', (request()->input('page', 1) - 1) * 5);
        // dd($orders);
    }
}
