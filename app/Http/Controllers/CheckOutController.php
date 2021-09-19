<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Session;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    public function check()
    {
        return view('front.checkout.checkOutField');
    }

    public function order(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'address' => 'required',
            'remark' => 'required'
        ]);
        
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->order_code = '#order'.time();
        $order->order_total = Session::get('sum');

        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->remark = $request->remark;

        $order->save();
        //echo($order->order_code);

        $cartfoods = Cart::content();
        foreach($cartfoods as $cart)
        {
            $order = Order::where('order_code','like',$order->order_code)->first();

            $orderDetails = new OrderDetail();

            $orderDetails->order_id = $order->order_id;
            $orderDetails->food_id = $cart->id;
            $orderDetails->food_name = $cart->name;
            $orderDetails->food_price = $cart->price;
            $orderDetails->food_qty = $cart->qty;

            $orderDetails->save();
        }

        Cart::destroy();
        return redirect('/foodlists')->withSuccessMessage("Order Successful");

    }
}
