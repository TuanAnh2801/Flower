<?php

namespace App\Mail;

use App\Models\Order;
use App\Models\UserPayment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderDetailsMail extends Mailable
{
    use Queueable, SerializesModels;
    private $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    // public function build()
    // {
    //     // $userOrders =  Order::with('OrderItems')->where('order_id',Auth::user()->id)->orderBy('id','desc')->get()->toArray();
        

    //     $orderData = [
    //         'full_name' => Auth::user()->first_name . ' ' . Auth::user()->last_name,
    //     ];
    //     $user = Auth::user();
    //     // $payments = UserPayment::where('user_id',$user->id)->latest()->first();
    //     $payments = DB::table('user_payment')->where('user_id',$user->id)->latest ()->first();
    //     // dd($payments->payment_type);
    //     return $this->view('frontend.email.orderDetailProduct', compact('orderData','payments'));
    // }
    public function build()
    {


        $user = Auth::user();

        $orderData = [
            'order_id' => $user->id, // hoặc là id của đơn hàng nếu bạn lưu đơn hàng trong bảng riêng
            'buy_at' => date('Y-m-d H:i:s'), // hoặc là thời gian đặt hàng của đơn hàng nếu bạn lưu đơn hàng trong bảng riêng
            'full_name' => $user->first_name . ' ' . $user->last_name,
            'telephone' => $user->telephone,
            'email' => $user->email,
            // thay $items bằng danh sách sản phẩm của đơn hàng nếu có
        ];

        $payments = DB::table('user_payment')->where('user_id', $user->id)->latest()->first();

        return $this->view('frontend.email.orderDetailProduct', compact('orderData', 'payments'));
    }
}
