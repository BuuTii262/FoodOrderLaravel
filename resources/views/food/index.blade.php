@extends('layouts.master')
@section('content')


<div class="jumbotron text-center bg-dark" style="border-radius: 0px;">
    <h1 class="text-white"><i class='bx bx-coffee-togo'></i></h1>
    <h3 class="text-white">FOOD</h3>
    <div class="float-right mr-3 mt-3">
        <a href="" class="btn btn-sm bg-white text-dark btnAdd" data-toggle="modal" 
        data-target="#AddModal"><i class='bx bx-plus-circle'></i> Add New</a>
        
    </div>
</div>


@include('food.create')

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
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

        @foreach($foods as $food)

        <tr>
            <td>{{ $food->name }}</td>

            <td>
                @if($food->food_image != "")
                                
                    <img src="{{ asset('uploads/foodImage/'.$food->food_image) }}"
                    class="border border-dark image_list">

                @else                                

                <img src="{{ asset('defaultPhoto/defaultfood.jpg') }}"  
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

            <td>
                <form action="{{ url('food/'.$food->uuid) }}" method="POST">
                    @csrf
                    @method('DELETE') 
                                    
                    <button type="button" class="btn btn-warning btn-sm" 
                    data-toggle="modal" data-target="#EditModal{{$food->uuid}}">
                    <i class='bx bx-edit-alt'></i> Edit
                    </button>
                                      
                    <button type="submit" class="btn btn-danger btn-sm" 
                    onclick="return confirm('Are you want to delete it?')">
                    <i class='bx bx-trash'></i> Delete</button>
                </form>
            </td>
            @include('food.edit')

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
    previewBeforeUpload("file-2");




    </script>



@endsection