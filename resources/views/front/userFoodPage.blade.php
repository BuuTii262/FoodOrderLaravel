@extends('layouts.usernav')

@section('user-content')
    <!-- gallery section start -->
    <br><br><br><br><br>
        <section class="popular" id="popular">
            <h1 class="heading"> Our <span>Foods</span> </h1>
            <br><br>
            <form action="{{ route('search_by_category') }}" method="GET"> 
                {{-- <p class="text-white h3">Search with Category Here</p> <br>                   --}}
                <div class="input-group">
                    
                    <select name="category_id" class="form-select-lg bg-white" aria-label="Default select example" 
                    style="font-size: 20px; height: 40px; text-align: center; border-top-left-radius: .5rem;border-bottom-left-radius: .5rem;">
                        <option value="all" selected>All</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->uuid }}">{{ $category->name }}</option>
                    @endforeach
                    </select>
                    <span class="input-group-prepend">
                        <button type="submit" class="btn-warning" style="font-size: 20px; padding:0 15px; background: gold;
                            border-top-right-radius: .5rem;border-bottom-right-radius: .5rem;">
                            <i class='bx bx-search-alt'>Search</i>
                        </button>
                    </span>            
                </div>                    
            </form>

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
                    @if ($food->have == "Yes")
                    <form action="{{ route('add_to_cart') }}" method="post">
                        @csrf 
                        <input type="hidden" name="food_id" value="{{$food->uuid}}">
                        <input type="hidden" name="qty" value="1">
                        <button class="btn bg-white" ><i class="fas fa-shopping-bag"></i> add to cart</button>
                    </form>   
                    @endif
                    
                </div>
        
                @endforeach
        
            </div>
        
        </section>
    <!-- gallery section end -->   
@endsection