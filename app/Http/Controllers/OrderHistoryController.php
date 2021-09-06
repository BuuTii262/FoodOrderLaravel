<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderHistoryController extends Controller
{
    public function viewHistory($user_id)
    {
        $orders = DB::table('orders')
                    ->join('users', 'orders.user_id','=' , 'users.id')
                    ->select('orders.*', 'users.name')
                    ->where('orders.user_id', '=' , $user_id)
                    ->latest()->get();
                    // dd($orders);
        return view('front.orderhistory.index', compact('orders'));
    }

    public function viewInvoice($order_id)
    {
        $order = Order::find($order_id);
        $user = User::find($order->user_id);
        $order_details = OrderDetail::where('order_id', $order->order_id)->get();

        return view('front.orderhistory.invoice', compact('order','user','order_details')); 
    }
}
