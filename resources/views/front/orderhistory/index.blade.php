@extends('layouts.usernav')

@section('user-content')

<div class="col-sm-3" style="margin-top: 100px"> 
    <a class="btn btn-sm ml-3" href="{{ URL::previous() }}"><i class='bx bx-left-arrow' ></i> Back</a>
</div>
<div class="row">

    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <div class="card">
            <div class="card-header">
                <p class="h3 text-dark">Order History</p>  
            </div>
            <div class="card-body">
                <div class="table-responsive"> 
                    <table class="table table-hover" style="font-size: 14px">
                      <thead class="bg-dark text-white">
                          <tr>
                              <th>ORDER CODE</th>        
                              <th>USER NAME</th>
                              <th>ORDER TOTAL</th>
                              <th>ORDER STATUS</th>
                              <th>ORDER DATE</th>
                              <th>ACTION</th>  
                          </tr>
                      </thead>
                      <tbody>
              
                      @foreach($orders as $order)
                                      <tr>
                                          
                                          <td>{{ $order->order_code }}</td>
                                      
                                          <td>{{ $order->name }}</td>
              
                                          <td>{{ $order->order_total }} MKK</td>
              
                                          <td>{{ $order->order_status }}</td>
              
                                          <td>{{ $order->created_at }}</td>
                                          
                                          <td>                
                                              <a href="{{ route('user_order_invoice',['order_id'=>$order->order_id]) }}" class="btn-primary btn-sm" style="font-size: 14px">
                                                  <i class="fas fa-info-circle"> Details</i>
                                              </a>   
                                          </td>
                                      </tr>
                                      @endforeach
                          
                      </tbody>
              
                    </table>
                </div>  
            </div>
        </div>    
    </div>
    <div class="col-sm-2"></div>

</div>    
              
  

@endsection