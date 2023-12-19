<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Str;

class OrderController extends Controller
{
    public function showOrder()
    {
        // $orders = Order::with('OrderItems')->with('shopping')->with('campaign')->orderBy('buy_at', 'desc')->get()->toArray();
        $orders = Order::with('OrderItems')->with('shopping')->with('campaign')->orderBy('buy_at', 'desc')->paginate(5);
        // $addresses = User::with('UserAddress')->get();
        // dd($orders  );
        return view('backend.order.order', compact('orders'))->with('i',(request()->input('page',1)-1)*5);
    }
    public function updateStatus(Request $request, $id)
    {
        // dd($request->input());
        $orders = Order::find($id);
        // dd($order);
        // $order= $orders->update($request->input('campaign_id'));
        // $orders->campaign_id = 2;
        $orders->campaign_id = $request->input('campaign_id');
        $orders->save();

        $delivery = [
            'order_id' => $request->input('order_id'),
            'name' => $request->input('name'),
            'total_price' => $request->input('total_price'),
            'telephone' =>  $request->input('telephone'),
            'address' =>  $request->input('address'),
        ];
        Delivery::create($delivery);
        // $orderDelivery= $orders->with('OrderItems')->with('shopping')->with('campaign')->orderBy('buy_at', 'desc')->get()->toArray();
        return redirect()->back()->with('success', 'Order status update successful');
    }
    public function delivery()
    {
        $orders = Delivery::paginate(5);
        // dd($orders);
        return view('backend.order.delivery', compact('orders'))->with('i',(request()->input('page',1)-1)*5);
    
    }
    public function delete($id)
    {
   
        $product = Order::findOrFail($id);
        $product->delete($id);
        return redirect()->back()->with('delete', 'Delete 1 order successfully');;
    }
    public function dateDelivery(Request $request)
    {
        $request->validate([
            'date'=>'required'
        ]);
        // $orders = Delivery::all();
        // dd($request->input());
        $date = $request->input('date');
        $orders = Delivery::whereDate('created_at',$date)->paginate(5);
       return view('backend.order.dateDelivery', compact('orders'))->with('i',(request()->input('page',1)-1)*5);
    }
    public function dateOrder(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'nullable|date',
        ]);
        
        $date = $request->input('date');
    
        if (is_null($date)) {
            return redirect()->back()->with(['date' => 'Please enter the date.']);
        }
    
    
        $orders = Order::whereDate('created_at', $date)
                            ->with('OrderItems')
                            ->with('shopping')
                            ->with('campaign')
                            ->orderBy('created_at', 'desc')
                            ->paginate(5);
        // dd($orders);
        return view('backend.order.dateOrder', compact('orders'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
