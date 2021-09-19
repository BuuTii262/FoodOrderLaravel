@extends('layouts.usernav')

@section('user-content')
<div class="col-sm-3" style="margin-top: 100px"> 
    <a class="btn btn-sm ml-3" href="{{ URL::previous() }}"><i class='bx bx-left-arrow' ></i> Back</a>
</div>
<div class="row">

    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <p class="h3 text-dark">Cart</p>  
            </div>
            <div class="card-body">
                <div class="table-responsive"> 
                    <table class="table table-hover" style="font-size: 14px">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>NO</th> 
                                <th>Remove</th> 
                                <th>IMAGE</th>                                                                   
                                <th>NAME</th>
                                <th>PRICE</th>
                                <th>QUANTITY</th>
                                <th>TOTOAL PRICE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @php($sum=0)
                            @foreach($cartfoods as $cartfood)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>
                                        <a href="{{ route('remove_item',['rowId' => $cartfood->rowId]) }}" type="button" class="btn-danger" style="width: 30px; height: 30px; text-align: center; padding-top: 5px; border-radius: 10px">
                                            <span style="font-weight: bold">x</span>
                                        </a>
                                    </td>
                                    <td> <img src="{{ asset('uploads/foodImage/'.$cartfood->options->food_image)}}" style="width: 50px;height: 50px; border-radius: 12px;"></td>
                                    <td>{{$cartfood->name}}</td>
                                    <td>{{$cartfood->price}} MKK</td>  
                                    <td>
                                        <form action="{{route('update_cart')}}" method="POST">
                                            @csrf 
                                            <input type="hidden" name="rowId" value="{{$cartfood->rowId}}">
                                            <input type="number" name="qty" value="{{$cartfood->qty}}" min="1" style="width: 35px; height: auto;">
                                            <input type="submit" name="btn" value="update">
                                        </form>
                                    </td>
                                    <td>{{$total_price = $cartfood->qty * $cartfood->price}} MKK</td>
                                    <input type="hidden" value="{{$sum = $sum+$total_price}}">                                     
                                </tr>
                            @endforeach
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>Total Price</th>
                                    <th>{{$sum}} MKK</th>
                                    <?php
                                        Session::put('sum', $sum);
                                    ?>
                                </tr>
                            </thead>
                        </tbody>
                    </table>
                
                </div>

            </div>
        </div>
    </div>    
    <div class="col-sm-3"></div> 
</div> 

<br><br><br>

<div class="row">
    <div class="col-sm-3"></div> 
    <div class="col-sm-6">

        {{-- <a href="{{route('new_order')}}" class="btn" style="float: right;">
            <i class="fa fa-shopping-bag"></i> Oreder Now    
        </a>   --}}
        <form action="{{ route('new_order') }}" method="POST">
            @csrf 

            <div class="form-group">
                <label for="forPhoneNumber" style="font-size: 20px;" class="text-white">Phone Number</label>
                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="forPhoneNumber" placeholder="example : 09254584519" style="font-size: 16px;">
                @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="forAddress" style="font-size: 20px;" class="text-white">Address</label>
                <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="forAddress" rows="5" style="font-size: 16px;" 
                placeholder="example : A Nauk Block / home no 172"></textarea>
                @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="forRemark" style="font-size: 20px;" class="text-white">Remark</label>
                <textarea class="form-control @error('remark') is-invalid @enderror" name="remark" id="forRemark" rows="5" style="font-size: 16px;" 
                placeholder="example : less ice and no spicy"></textarea>
                @error('remark')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn" style="background: #000; float: right;" onclick="return confirm('Please Click Ok To Order')"><i class="fa fa-shopping-bag"></i> Oreder Now</button>
        </form>  
    </div>
    {{-- <div class="col-sm-6">
        <a href="" data-toggle="modal" data-target="#exampleModalCenter" class="btn" style="float: right;">
            <i class="fa fa-shopping-bag"></i> Checkout    
        </a>    
    </div>  --}}
    <div class="col-sm-3"></div> 
</div>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  {{-- End Modal --}}
@endsection