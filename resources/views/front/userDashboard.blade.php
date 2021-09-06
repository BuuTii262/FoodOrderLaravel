@extends('layouts.usernav')

@section('user-content')
    <!-- home section start -->
    <section class="home" id="home">
            
        <div class="content">
            <h3><i class='bx bx-spa'></i> Yu Lian Restourant</h3>
            <p>You can choose your favorite foods and order. Within a few moment it will arrive to your home. And you can enjoy our fresh and delicious foods.</p>
            <a href="{{url('foodlists')}}" class="btn">Let Order </a>
        </div>

        <div class="image">
            <div style="text-align: right;"> 
                @foreach(Auth::user()->roles as $role)
                    @if($role->name == 'Admin')
                        <a href="{{ url('/admindashboard') }}" class="btn">Admin Dashboard</a> 
                    @endif 
                @endforeach  
                @foreach(Auth::user()->roles as $role)
                    @if($role->name == 'Staff')
                        <a href="{{ url('/admindashboard') }}" class="btn">Admin Dashboard</a> 
                    @endif 
                @endforeach 
            </div>

            <img src="{{ asset('uploads/images/home-img.png') }}" alt="">
        </div>
        
    </section>
    <!-- home section end -->

    <!-- special section start -->
    <section class="speciality" id="special">
        <h1 class="heading"> Our <span>speciality</span> Menu</h1>

        <div class="boxcontainer">
            @foreach ($special_categories as $special_category)
            <div class="box">
                <img class="image" src="{{ asset('uploads/categoryImage/'.$special_category->category_image) }}" alt="">
                <div class="content">
                    {{-- <img src="{{ asset('uploads/images/s-1.png') }}"  alt=""> --}}
                    <img src="{{ asset('uploads/categoryImage/'.$special_category->category_image) }}"  alt="">
                    <h3>{{$special_category->name}}</h3>
                    {{-- <p>Lorem Ipsum Dolor Sit, Amet Consectetur Adipisicing Elit. Voluptas Accusamus Tempore Temporibus Rem Amet Laudantium Animi Optio Voluptatum. Natus Obcaecati Unde Porro Nostrum Ipsam Itaque Impedit Incidunt Rem Quisquam Eos!</p> --}}
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!-- special section end -->

    <!-- Popular section start -->
    <section class="popular" id="popular">
        <h1 class="heading"> Our <span>Popular</span> Foods</h1>
    
        <div class="box-container">
    
            @foreach($popular_foods as $popular_food)
    
            <div class="box">
                <span class="price">{{$popular_food->price}}MKK</span>
                <img src="{{asset('uploads/foodImage/'.$popular_food->food_image)}}" alt="">
                <h3>{{$popular_food->name}}</h3>
                <div class="stars">
                    <i class="fas fa-info-circle">detials</i>
                </div>
                @if ($popular_food->have == "Yes")
                <form action="{{ route('add_to_cart') }}" method="post">
                    @csrf 
                    <input type="hidden" name="food_id" value="{{$popular_food->uuid}}">
                    <input type="hidden" name="qty" value="1">
                    <button class="btn bg-white"><i class="fas fa-shopping-bag"></i> add to cart</button>
                </form>
                @endif
            </div>
    
            @endforeach
    
        </div>
    
    </section>
    <!-- Popular section end -->

    <!-- Step section end -->
    <section id="steps">
        <h1 class="heading"> Order <span>Steps</span></h1>
        <section class="steps">
            <div class="box">
                <img src="{{ asset('uploads/images/step-1.jpg') }}" alt="">
                <h3>choose your favorite foods</h3>
            </div>
            <div class="box">
                <img src="{{ asset('uploads/images/step-2.jpg') }}" alt="">
                <h3>free and fast deliver</h3>
            </div>
            <div class="box">
                <img src="{{ asset('uploads/images/step-3.jpg') }}" alt="">
                <h3>easy payment method</h3>
            </div>
            <div class="box">
                <img src="{{ asset('uploads/images/step-4.jpg') }}" alt="">
                <h3>and enjoy fresh and delicious foods</h3>
            </div>

        </section>
    </section>

    <!-- Step section end --> 
    
    <!-- gallery section start -->
    <section class="gallery" id="gallery">
        <h1 class="heading"> Our Food <span>Gallery</span></h1>

        <div class="box-container">
            @foreach ($allfoods as $food)
                <div class="box">
                    <img src="{{asset('uploads/foodImage/'.$food->food_image)}}" alt="">
                    <div class="content">
                        <h3>{{$food->name}}</h3>
                        <p>{{$food->description}}</p>
                        @if ($food->have == "Yes")
                        <form action="{{ route('add_to_cart') }}" method="post">
                            @csrf 
                            <input type="hidden" name="food_id" value="{{$food->uuid}}">
                            <input type="hidden" name="qty" value="1">
                            <button class="btn bg-white"><i class="fas fa-shopping-bag"></i> add to cart</button>
                        </form>
                        @endif
                    </div>
                </div>    
            @endforeach
        </div>

    </section>
    <!-- gallery section end -->


    <!-- scroll top button -->
    <a href="#home" class="fas fa-angle-up" id="scroll-top"></a>
@endsection
