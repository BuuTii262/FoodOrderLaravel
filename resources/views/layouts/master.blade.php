<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Order</title> 
    <link  href="/css/nav.css" rel="stylesheet">
    <link  href="/css/image.css" rel="stylesheet"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Boxicon CDN link -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
</head>
<body>
    <!-- side bar start -->
        <div class="sidebar">

            <div class="logo_content">
                <div class="logo">
                    <i class='bx bx-spa'></i>
                    <div class="logo_name">Yu Lian</div>
                </div>
                <i class='bx bx-menu' id="btn"></i>
            </div>
            <ul class="nav_list">
                <!-- <li>
                    
                        <i class='bx bx-search'></i>
                        <input type="text" placeholder="Search...">
                    
                    <span class="tooltip">Search</span>                   
                </li> -->
                <li>
                    <a href="#">
                        <i class='bx bx-grid-alt'></i>
                        <span class="links_name">Dashboard</span>
                    </a>
                    <span class="tooltip">Dashboard</span>                   
                </li>
                <li>
                    <a href="#">
                        <i class='bx bx-user-circle'></i>
                        <span class="links_name">User</span>
                    </a>
                    <span class="tooltip">User</span>                   
                </li>
                <li>
                    <a href="{{url('category')}}">
                        <i class='bx bx-food-menu'></i>
                        <span class="links_name">Category</span>
                    </a>
                    <span class="tooltip">Category</span>                   
                </li>
                <li>
                    <a href="{{url('food')}}">
                        <i class='bx bx-coffee-togo'></i>
                        <span class="links_name">Food</span>
                    </a>
                    <span class="tooltip">Food</span>                   
                </li>
                <li>
                    <a href="#">
                        <i class='bx bx-list-ul'></i>
                        <span class="links_name">Order</span>
                    </a>
                    <span class="tooltip">Order</span>                   
                </li>
            </ul>
            <div class="profile_content">
                <div class="profile">
                    <div class="profile_details">
                        <img src="{{ asset('defaultPhoto/defaultfood.jpg') }}" alt="">
                        <div class="name_job">
                            <div class="name">Thiha Aung</div>
                            <div class="job">ADMIN</div>
                        </div>
                    </div>
                    <i class='bx bx-log-out' id="log_out"></i>
                </div>
            </div>

        </div>
    <!-- side bar end -->
    <div class="home_content">
    
        @yield('content')
   
    </div>
    <script type="text/javascript" src="/js/nav.js"></script>
</body>
</html>