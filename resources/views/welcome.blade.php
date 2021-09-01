<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 

    <!-- boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link  href="/css/welcome.css" rel="stylesheet"> 
</head>
<body>
    <!-- header section start -->
    <header>
        <a href="#home" class="logo"><i class='bx bx-spa'></i>Yu Lian</a>

        <div id="menu-bar" class="fas fa-bars"></div>

        <nav class="navbar">
            <a href="#home">Home</a>
            <a href="#special">Special</a>
            <a href="#popular">Popular</a>
            <a href="#steps">Step</a>
            <a href="#gallery">Gallery</a>
        </nav>
    </header>
    <!-- header section end -->

    <!-- home section start -->
    {{-- <section class="home" id="home" style="background: url('{{ asset('uploads/images/home-bg.jpg')}}');"> --}}
    <section class="home" id="home">
        
        <div class="content">
            <h3>Welcome From Our Restourant</h3>
            <p>Enjoy fresh and delicious Foods, Enjoy fresh and delicious Foods, Enjoy fresh and delicious Foods, Enjoy fresh and delicious Foods,Enjoy fresh and delicious Foods,Enjoy fresh and delicious Foods.</p>
            <a href="#" class="btn">Start Order </a>
        </div>

        <div class="image">
            <div style="text-align: right;"> 
                @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                            <a href="{{ url('/normaluser') }}" class="btn">Home</a>
                        @else
                            <a href="{{ route('login') }}" class="btn">Log in</a>&nbsp;&nbsp;&nbsp;

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
            {{-- <img src="{{ asset('uploads/images/food.gif') }}" alt=""> --}}
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
                <a href="#" class="btn">Order Now</a>
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
                        <a href="#" class="btn">Order Now</a>
                    </div>
                </div>    
            @endforeach
        </div>
        {{-- <br>
        <div class="pagination-block d-flex justify-content-center h1">
            {{ $allfoods->links('layouts.paginationlink') }}
        </div> --}}
    </section>
    <!-- gallery section end -->

    <!-- footer section start -->
    <section class="footer">

        <div class="share">
            <a href="#" class="btn-social"><i class='bx bxl-facebook-circle'></i></a>
            <a href="#" class="btn-social"><i class='bx bxl-instagram' ></i></a>
            <a href="#" class="btn-social"><i class='bx bxl-twitter' ></i></a>
            <a href="#" class="btn-social"><i class='bx bxl-linkedin' ></i></a>
        </div>
        <h1 class="credit">created by <span> Sai Thiha Aung </span></h1>

    </section>
    
    <!-- footer section end -->


    <!-- scroll top button -->

    <a href="#home" class="fas fa-angle-up" id="scroll-top"></a>

    <!-- loader -->
    <div class="loader-container" style="background: #feda31">
        <img src="{{asset('uploads/images/loader.gif')}}" alt="">
    </div>



    <script src="/js/welcome.js"></script>
</body>
</html>