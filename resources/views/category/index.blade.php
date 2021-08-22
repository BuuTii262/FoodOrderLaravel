@extends('layouts.master')
@section('content')


<div class="jumbotron text-center bg-dark" style="position: sticky;">
    <h1 class="text-white"><i class='bx bx-food-menu'></i></h1>
    <h3 class="text-white">CATEGORY</h3>
    <div class="float-right mr-5">
        <a href="" class="btn btn-sm bg-white text-dark btnAdd" data-toggle="modal" 
        data-target="#AddModal">Add New</a>
        
    </div>
</div>

@include('category.create')

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
                <th>STATUS</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

        @foreach($categories as $category)
                        <tr>
                            
                            <td>{{ $category->name }}</td>
                            <td>
                                @if($category->category_image != "")
                                
                                    <img src="{{ storage_path('/home/saithihaaung/Pictures/FoodOrder/'.$category->category_image) }}" width="50px"  
                                    class="border border-dark rounded">

                                @else                                

                                    <img src="{{ asset('defaultPhoto/defaultfood.jpg') }}" width="50px"   
                                    class="border border-dark rounded">
                              
                                @endif
                                
                            </td>
                            <td>{{ $category->status }}</td>
                            <td>
                                <form action="{{ url('category/'.$category->uuid) }}" method="POST">
                                @csrf
                                @method('DELETE') 
                                    
                                        <button type="button" class="btn btn-warning btn-sm" 
                                        data-toggle="modal" data-target="#EditModal{{$category->uuid}}">
                                            Edit
                                        </button>
                                      
                                    <button type="submit" class="btn btn-danger btn-sm" 
                                    onclick="return confirm('Are you want to delete it?')">Delete</button>
                                </form>
                            </td>
                            @include('category.edit')
                        </tr>
                        @endforeach
            
        </tbody>

      </table>
      <div class="pagination-block d-flex justify-content-center">
      {{ $categories->links('layouts.paginationlink') }}
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