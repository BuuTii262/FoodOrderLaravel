<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdminOrStaff');  
       
    }
    
    public function index()
    {
        if(session('success_message'))
        {
            Alert::success('Success', session('success_message'));
        }
        $orders = DB::table('orders')
                    ->join('users', 'orders.user_id','=' , 'users.id')
                    ->select('orders.*', 'users.name')
                    ->get();
                    // dd($orders);
        Session::put('tasks_url', request()->fullUrl());
        return view('order.index', compact('orders'));
    }

    public function viewOrder($order_id)
    {
        $order = Order::find($order_id);
        $user = User::find($order->user_id);
        $order_details = OrderDetail::where('order_id', $order->order_id)->get();

        return view('order.orderDetails', compact('order','user','order_details'));
    }
    public function deleteOrder($order_id)
    {
        $order = Order::find($order_id);
        $order->delete();
        return back()->withSuccessMessage("Order Delete Successfully");
    }

    public function viewInvoice($order_id)
    {
        $order = Order::find($order_id);
        $user = User::find($order->user_id);
        $order_details = OrderDetail::where('order_id', $order->order_id)->get();

        return view('order.orderInvoice', compact('order','user','order_details'));   
    }
}
