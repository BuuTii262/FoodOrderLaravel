@extends('layouts.master')
@section('content')
<br><br>
<div class="row">

    <div class="col-sm-3"> <a class="btn btn-dark btn-sm ml-3" href="{{ URL::previous() }}"><i class='bx bx-left-arrow' ></i> Back</a></div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <p class="h3 text-dark">Customer info for this Order</p>  
            </div>
            <div class="card-body">
                <div class="table-responsive"> 
                    <table class="table table-hover" style="font-size: 14px">
                        <tr>
                            <th>NAME</th>
                            <th>{{$user->name}}</th>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <th>{{$user->email}}</th>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <th>{{$order->phone}}</th>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <th>{{$order->address}}</th>
                        </tr>
                    </table>
                
                </div>

            </div>
        </div>
    </div>    
    <div class="col-sm-3"></div> 
</div> 
<br><br>
<div class="row">

    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <p class="h3 text-dark">ORDER DETAILS</p>  
            </div>
            <div class="card-body">
                <div class="table-responsive"> 
                    <table class="table table-hover" style="font-size: 14px">
                        <thead>
                            <tr>
                                <th>FOOD NAME</th>
                                <th>QTY</th>
                                <th>PRICE</th>
                                <th>TOTAL PRICE</th>
                            </tr>
                        </thead>
                        <tbody>    
                        @foreach ($order_details as $order_detail)
                            <tr>
                                <th>{{$order_detail->food_name}}</th>
                                <th>{{$order_detail->food_qty}}</th>
                                <th>{{$order_detail->food_price}}</th>
                                <th>{{$order_detail->food_price * $order_detail->food_qty}}</th>
                            </tr> 
                        @endforeach
                        <tr>
                            <th></th>
                            <th></th>
                           
                            <th>TOTAL PRICE</th>
                            <th>{{$order->order_total}}</th>
                        </tr> 
                        <tr>
                            <th>Remark</th>
                            <td colspan="3">{{$order->remark}}</td>
                        </tr> 
                        </tbody>
                        {{-- {{$order_details}} --}}
                        
                    </table>
                
                </div>

            </div>
        </div>
    </div>    
    <div class="col-sm-3"></div> 
</div> 
<br><br>
@endsection