<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yu Lian</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 

    <!-- boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link  href="/css/welcome.css" rel="stylesheet"> 

    <style>
        .imageDetail{
            width: 100%;
            /* height: 400px; */
            border: 1px solid black;
            border-radius: .5rem;
        }
    </style>

</head>
<body>
    <!-- header section start -->
    <header>
        <a href="{{url('normaluser')}}" class="logo"><i class='bx bx-spa'></i>Yu Lian</a>

        <div id="menu-bar" class="fas fa-bars"></div>

        <nav class="navbar">
            <a href="{{url('normaluser')}}"><i class="fas fa-home"></i></a>
            <a href="{{url('foodlists')}}"><i class="fas fa-pizza-slice"></i></a>
            <a href="{{url('/cart/show')}}"><i class="fas fa-shopping-bag"></i></a>
            <a href="{{ route('view_order_history',['user_id'=>Auth::user()->id]) }}"><i class="fas fa-history"></i></a>
            
            <a href="{{ url('/user/'.Auth::user()->id.'/editprofile') }}"><i class="fas fa-user-alt"></i></a>
            <a href="{{ route('logout') }}"
                onclick="
                event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>


        </nav>
    </header>
    <!-- header section end -->

    <div class="home_content">
    
        @yield('user-content')
        @include('sweetalert::alert')

    </div>

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
    <script src="/js/welcome.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>