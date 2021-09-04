@extends('layouts.master')
@section('content')


<div class="jumbotron text-center bg-dark" style="border-radius: 0px;">
    <a class="text-white h1" href="{{url('/category')}}"><i class="fas fa-shopping-cart"></i></a>
    <h3 class="text-white">Orders</h3>
    <div class="d-flex float-right mr-3 mt-3">
        <form action="#" method="GET">                    
            <div class="input-group class="float-left">
                <input type="text" class="form-control bg-dark text-white border border-white border-top-0 border-left-0 border-right-0" name="search"
                placeholder="Enter name to search" value="{{ old('search') }}">
                <span class="input-group-prepend">
                    <button type="submit" class="btn text-dark bg-white rounded-circle"><i class='bx bx-search-alt'></i></button>
                </span>            
            </div>                    
        </form>
        
    </div>
</div>
              
  <div class="table-responsive"> 
      <table class="table table-hover">
        <thead class="bg-dark text-white">
            <tr>
                <th>ORDER CODE</th>        
                <th>USER NAME</th>
                <th>ORDER TOTAL</th>
                <th>ORDER STATUS</th>
                <th>ORDER DATE</th>
                @foreach(Auth::user()->roles as $role)
                    @if($role->name == 'Admin')
                        <th>ACTION</th>
                    @endif
                @endforeach    
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
                            
                            @foreach(Auth::user()->roles as $role)
                                @if($role->name == 'Admin')
                                    <td>
                                        <form action="{{ route('delete_order',['order_id'=>$order->order_id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE') 
                                            
                                            <a href="{{ route('view_order',['order_id'=>$order->order_id]) }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-info-circle"></i>
                                            </a>

                                            <a href="{{ route('view_order_invoice',['order_id'=>$order->order_id]) }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-file-invoice-dollar"></i>
                                            </a>

                                            <button type="submit" class="btn btn-danger btn-sm" 
                                            onclick="return confirm('Are you want to delete it?')">
                                            <i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                    
                                @endif
                            @endforeach
                        </tr>
                        @endforeach
            
        </tbody>

      </table>
      {{-- <div class="pagination-block d-flex justify-content-center">
      {{ $categories->links('layouts.paginationlink') }}
      </div> --}}
  </div>    

@endsection