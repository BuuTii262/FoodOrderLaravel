@extends('layouts.master')
@section('content')

<div class="jumbotron text-center bg-dark" style="border-radius: 0px;">
    <h1 class="text-white"><i class='bx bx-home'></i></h1>
    <h3 class="text-white">Dashboard</h3>
</div>
  

<div class="container-fluid">

    <div class="row">

        <div class="col-sm-3">
            <div class="card text-white mb-3 text-center">
            <h1 class="card-header bg-dark"><i class='bx bx-user-circle'></i></h1>
            <div class="card-body text-dark">
                <p class="card-title h4">73 Users</p>
                <a href="#" class="btn btn-outline-dark btn-lg btn-block">View All</a>           
            </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card text-white mb-3 text-center">
            <h1 class="card-header bg-dark"><i class='bx bx-category-alt'></i></h1>
            <div class="card-body text-dark">
                <p class="card-title h4">7 Categories</p> 
                <a href="{{url('category')}}" class="btn btn-outline-dark btn-lg btn-block">View All</a>           
            </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card text-white mb-3 text-center">
            <h1 class="card-header bg-dark"><i class='bx bx-coffee-togo'></i></h1>
            <div class="card-body text-dark">
                <p class="card-title h4">30 Foods</p>
                <a href="{{url('food')}}" class="btn btn-outline-dark btn-lg btn-block">View All</a>           
            </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card text-white mb-3 text-center">
            <h1 class="card-header bg-dark"><i class='bx bx-cart-alt'></i></h1>
            <div class="card-body text-dark">
                <p class="card-title h4">73 Orders</p>  
                <a href="#" class="btn btn-outline-dark btn-lg btn-block">View All</a>           
                         
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>                                   
                                    <td>Thiha Aung</td>
                                    <td>Block 10</td>
                                    <td>09254584519</td>
                                    <td>4</td>
                                    <td><button type="button" class="btn btn-primary btn-sm">Detals</button></td>
                                </tr>
                                <tr>                                   
                                    <td>Seng Mo</td>
                                    <td>Block 6</td>
                                    <td>09254584519</td>
                                    <td>2</td>
                                    <td><button type="button" class="btn btn-primary btn-sm">Detals</button></td>
                                </tr>
                                <tr>                                   
                                    <td>Kyaw Gyi</td>
                                    <td>Block 10</td>
                                    <td>09254584519</td>
                                    <td>6</td>
                                    <td><button type="button" class="btn btn-primary btn-sm">Detals</button></td>
                                </tr>
                                <tr>                                   
                                    <td>Mg Kaung</td>
                                    <td>Block 1</td>
                                    <td>09254584519</td>
                                    <td>1</td>
                                    <td><button type="button" class="btn btn-primary btn-sm">Detals</button></td>
                                </tr>
                                <tr>                                   
                                    <td>Ma May</td>
                                    <td>Block 10</td>
                                    <td>09254584519</td>
                                    <td>4</td>
                                    <td><button type="button" class="btn btn-primary btn-sm">Detals</button></td>
                                </tr>
                                
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>                                  
                                    <td>Thiha Aung</td>
                                    <td>tha.buutii26299@gmail.com</td>
                                    <td><button type="button" class="btn btn-primary btn-sm">Detals</button></td>
                                </tr>

                                <tr> 
                                                                     
                                    <td>Thiha Aung</td>
                                    <td>tha.buutii26299@gmail.com</td>
                                    <td><button type="button" class="btn btn-primary btn-sm">Detals</button></td>
                                </tr>

                                <tr> 
                                                                     
                                    <td>Thiha Aung</td>
                                    <td>tha.buutii26299@gmail.com</td>
                                    <td><button type="button" class="btn btn-primary btn-sm">Detals</button></td>
                                </tr>

                                <tr> 
                                                                     
                                    <td>Thiha Aung</td>
                                    <td>tha.buutii26299@gmail.com</td>
                                    <td><button type="button" class="btn btn-primary btn-sm">Detals</button></td>
                                </tr>
                                <tr> 
                                                                    
                                    <td>Thiha Aung</td>
                                    <td>tha.buutii26299@gmail.com</td>
                                    <td><button type="button" class="btn btn-primary btn-sm">Detals</button></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
        </div>

    </div>    



</div>

@endsection