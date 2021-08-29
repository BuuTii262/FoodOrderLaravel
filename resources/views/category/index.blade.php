@extends('layouts.master')
@section('content')


<div class="jumbotron text-center bg-dark" style="border-radius: 0px;">
    <a class="text-white h1" href="{{url('/category')}}"><i class='bx bx-food-menu'></i></a>
    <h3 class="text-white">Category</h3>
    <div class="d-flex float-right mr-3 mt-3">
        <form action="/searchcategory" method="GET">                    
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

@include('category.create')
              
  <div class="table-responsive"> 
      <table class="table table-hover">
        <thead class="bg-dark text-white">
            <tr>
                         
                <th>NAME</th>
                <th>IMAGE</th>
                <th>STATUS</th>
                @foreach(Auth::user()->roles as $role)
                    @if($role->name == 'Admin')
                        <th>Action</th>
                    @endif
                @endforeach    
            </tr>
        </thead>
        <tbody>

        @foreach($categories as $category)
                        <tr>
                            
                            <td>{{ $category->name }}</td>
                            <td>
                                @if($category->category_image != "")

                                    <img src="{{ asset('uploads/categoryImage/'.$category->category_image) }}" 
                                    class="border border-dark image_list">

                                @else                                

                                    <img src="{{ asset('defaultPhoto/defaultfood.jpg') }}"  
                                    class="border border-dark image_list">
                              
                                @endif
                                
                            </td>
                            <td>{{ $category->status }}</td>
                            <!-- user with admin role can see and edit -->
                            @foreach(Auth::user()->roles as $role)
                                @if($role->name == 'Admin')
                                    <td>
                                        <form action="{{ url('category/'.$category->uuid) }}" method="POST">
                                        @csrf
                                        @method('DELETE') 
                                            
                                                <button type="button" class="btn btn-warning btn-sm" 
                                                data-toggle="modal" data-target="#EditModal{{$category->uuid}}">
                                                <i class='bx bx-edit-alt'></i> Edit
                                                </button>
                                            
                                            <button type="submit" class="btn btn-danger btn-sm" 
                                            onclick="return confirm('Are you want to delete it?')">
                                            <i class='bx bx-trash'></i> Delete</button>
                                        </form>
                                    </td>
                                    @include('category.edit')

                                @endif
                            @endforeach
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




    </script>



@endsection