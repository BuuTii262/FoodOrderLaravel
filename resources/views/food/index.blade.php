@extends('layouts.master')
@section('content')


<div class="jumbotron text-center bg-dark" style="border-radius: 0px;">
    <a class="text-white h1" href="{{url('/food')}}"><i class="fas fa-pizza-slice"></i></a>
    <h3 class="text-white">Food</h3>
    <div class="d-flex float-right mr-3 mt-3">
        <form action="/searchfood" method="GET">                    
            <div class="input-group class="float-left">
                <input type="text" class="form-control bg-dark text-white border border-white border-top-0 border-left-0 border-right-0" name="search"
                placeholder="Enter name to search" value="{{ old('search') }}">
                <span class="input-group-prepend">
                    <button type="submit" class="btn text-dark bg-white rounded-circle"><i class='bx bx-search-alt'></i></button>
                </span>            
            </div>                    
        </form>
        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        <a href="" class="btn btn-md bg-white text-dark btnAdd" data-toggle="modal" 
        data-target="#AddModal"><i class='bx bx-plus-circle'></i> Add New</a>
        
    </div>
</div>


@include('food.create')

@error('food_name')
    <div class="alert alert-danger alert-dismissibel show fade text-center">
        <strong>{{ $message }}</strong>
        <button class="close" data-dismiss="alert">&times;</button>
    </div> 
@enderror
@error('category_id')
    <div class="alert alert-danger alert-dismissibel show fade text-center">
        <strong>{{ $message }}</strong>
        <button class="close" data-dismiss="alert">&times;</button>
    </div> 
@enderror
@error('price')
    <div class="alert alert-danger alert-dismissibel show fade text-center">
        <strong>{{ $message }}</strong>
        <button class="close" data-dismiss="alert">&times;</button>
    </div> 
@enderror
@error('description')
    <div class="alert alert-danger alert-dismissibel show fade text-center">
        <strong>{{ $message }}</strong>
        <button class="close" data-dismiss="alert">&times;</button>
    </div> 
@enderror

<div class="container">
@if(Session('successAlert'))
                <div class="alert alert-success alert-dismissibel show fade" role="alert">
                    <strong>{{ Session('successAlert') }}</strong>
                    <button class="close" data-dismiss="alert">&times;</button>
                </div>
@endif
</div> 
              
  <div class="table-responsive"> 
      <table class="table table-hover">
        <thead class="bg-dark text-white">
            <tr>             
                <th>NAME</th>
                <th>IMAGE</th>
                <th>CATEGORY</th>
                <th>PRICE</th>
                <th>HAVE</th>
                <th>STATUS</th>
                @foreach(Auth::user()->roles as $role)
                    @if($role->name == 'Admin')
                <th>Action</th>
                    @endif
                @endforeach    
            </tr>
        </thead>
        <tbody>

        @foreach($foods as $food)

        <tr>
            <td>{{ $food->name }}</td>

            <td>
                @if($food->food_image == 'defaultfood.jpg')

                <img src="{{ asset('defaultPhoto/defaultfood.jpg') }}"  
                class="border border-dark image_list">
                                                    
                @else 

                <img src="{{ asset('uploads/foodImage/'.$food->food_image) }}"
                class="border border-dark image_list">   

                @endif
                                
            </td>

            <td>
                @if(!empty($food->categories[0]))
                {{ $food->categories[0]->name }}
                <input type="hidden" value="{{$food->categories[0]->uuid}}"> 
                @else
                -<input type="hidden" value="">
                @endif
            </td>

            <td>{{ $food->price }}</td>

            <td>{{ $food->have }}</td>
            
            <td>{{ $food->status }}</td>

            <!-- user with admin role can see and edit -->
            @foreach(Auth::user()->roles as $role)
                @if($role->name == 'Admin')
            <td>
                    <button type="button" class="btn btn-warning btn-sm" 
                    data-toggle="modal" data-target="#EditModal{{$food->uuid}}">
                    <i class='bx bx-edit-alt'></i> Edit
                    </button>
                                      
                    <button type="submit" class="btn btn-danger btn-sm" 
                    data-toggle="modal" data-target="#DeleteModal{{$food->uuid}}">
                    <i class='bx bx-trash'></i> Delete</button>
                        
            </td>
            @include('food.edit')
            @include('food.delete')
                @endif
            @endforeach
            <!-- user with admin role can see and edit -->

        </tr>
                        
        @endforeach
            
        </tbody>

      </table>
      <div class="pagination-block d-flex justify-content-center">
      {{ $foods->links('layouts.paginationlink') }}
      </div>
  </div>    
  
<script>

    function previewBeforeUpload(id){
        document.querySelector("#"+id).addEventListener("change",function(e){
            if(e.target.files.length==0){
                return;

            }
            let file = e.target.files[0];
            let url = URL.createObjectURL(file);
            document.querySelector("#"+id+"-preview div").innerText = file.name;
            document.querySelector("#"+id+"-preview img").src = url;

        });
    }
    previewBeforeUpload("file-1");
    </script>



@endsection