@extends('layouts.usernav')

@section('user-content')
    <!-- gallery section start -->
    <br><br><br><br><br>
        <section class="popular" id="popular">
            <h1 class="heading"> Our <span>Foods</span> </h1>
            <br><br>
            <div class="box-container">
        
                @foreach($foods as $food)
        
                <div class="box">
                    <span class="price">{{$food->price}}MKK</span>
                    <img src="{{asset('uploads/foodImage/'.$food->food_image)}}" alt="">
                    <h3>{{$food->name}}</h3>
                    <div class="stars">
                        <i class="fas fa-info-circle">detials</i>
                    </div>

                    <form action="{{ route('add_to_cart') }}" method="post">
                        @csrf 
                        <input type="hidden" name="food_id" value="{{$food->uuid}}">
                        <input type="hidden" name="qty" value="1">
                        <button class="btn bg-white">add to cart</button>
                    </form>
                </div>
        
                @endforeach
        
            </div>
        
        </section>
    <!-- gallery section end -->   
@endsection