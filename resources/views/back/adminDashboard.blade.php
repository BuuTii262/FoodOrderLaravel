@extends('layouts.master')
@section('content')

<div class="jumbotron text-center bg-dark" style="border-radius: 0px;">
    <a class="text-white h1" href="{{url('admindashboard')}}"><i class="fas fa-home"></i></h1></a>
    <h3 class="text-white">Dashboard</h3>
</div>
  

<div class="container-fluid">

    <div class="row">

        <div class="col-sm-3">
            <div class="card text-white mb-3 text-center">
            <h2 class="card-header bg-dark"><i class="fas fa-users"></i></h2>
            <div class="card-body text-dark">
                <p class="card-title h4 mb-3">{{count($alluser)}} Users</p>
                
                    <a href="{{url('user')}}" class="btn btn-outline-dark btn-md">View All</a> 
                       
            </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card text-white mb-3 text-center">
            <h2 class="card-header bg-dark"><i class="fas fa-list-alt"></i></h2>
            <div class="card-body text-dark">
                <p class="card-title h4 mb-3">{{count($allcategory)}} Categories</p> 
                <a href="{{url('category')}}" class="btn btn-outline-dark btn-md">View All</a>           
            </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card text-white mb-3 text-center">
            <h2 class="card-header bg-dark"><i class="fas fa-pizza-slice"></i></h2>
            <div class="card-body text-dark">
                <p class="card-title h4 mb-3">{{count($allfood)}} Foods</p>
                <a href="{{url('food')}}" class="btn btn-outline-dark btn-md">View All</a>           
            </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card text-white mb-3 text-center">
            <h2 class="card-header bg-dark"><i class="fas fa-shopping-cart"></i></h2>
            <div class="card-body text-dark">
                <p class="card-title h4 mb-3">{{count($allorder)}} Orders</p>  
                <a href="{{url('order')}}" class="btn btn-outline-dark btn-md">View All</a>           
                         
            </div>
            </div>
        </div>
        
    </div>
    <!-- end of cards -->
    <br><br>


    <div class="row">

        <div class="col-sm-7">
            <div class="card">
                <div class="card-header">
                    <p class="h5 text-dark">Recently Orders</p> 
                </div>
                <div class="card-body">
                    <div class="table-responsive"> 
                        <table class="table table-hover">
                            <thead class="bg-dark text-white">
                                <tr>                                   
                                    <th>USER NAME</th>
                                    <th>ADDRESS</th>
                                    <th>PHONE</th>
                                    <th>ORDER QTY</th>
                                    <th>STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>                                   
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->address }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>{{ $order->order_total }}</td>
                                    <td>{{ $order->order_status }}</td>
                                    {{-- <td><button type="button" class="btn btn-primary btn-sm">Detals</button></td> --}}
                                </tr>
                                @endforeach
                                
                            </tbody>

                        </table>
                    </div>   
                </div>


            </div>
        </div>

        <div class="col-sm-5">
            <div class="card">
                <div class="card-header">
                <p class="h5 text-dark">Recently Users</p>  
                </div>
                <div class="card-body">
                    <div class="table-responsive"> 
                        <table class="table table-hover">
                            <thead class="bg-dark text-white">
                                <tr>                                                                     
                                    <th>USER NAME</th>
                                    <th>MAIL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>                                       
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>

                </div>
        </div>

    </div>    



</div>

@endsection