@extends('layouts.master')
@section('content')
<div class="jumbotron text-center bg-dark">
    <h1 class="text-white"><i class='bx bx-food-menu'></i></h1>
    <h2 class="text-white">Category</h2>
    <div class="float-right mr-5">
        <a href="" class="btn btn-primary btnAdd" data-toggle="modal" data-target="#myModal">Add New</a>
    </div>
</div>

      <table class="table">
        <thead>
            <tr>             
                <th>NAME</th>
                <th>IMAGE</th>
                <th>STATUS</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>

      </table>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Category</h4>
      </div>
      <div class="modal-body">


      <form action="category" method="POST" id="form">
          @csrf
          <div class="form group">
              <label>Category Name</label>
              <input type="text" name="category_name" class="form-control" id="name">
          </div>
          <br>

          <div class="form-elememt">
                    <label for="file">Food Image</label><br>
                        <input type="file" id="file-1" name="food_image" 
                        class="form-control @error('food_image') is-invalid @enderror">
                        @error('food_image')
                        <div class="invalid-feedback" style="color: red;">Upload Image !</div>
                        @enderror 
                        
                        <label for="file-1" id="file-1-preview">
                            <img src="{{ asset('defaultPhoto/jisoo.jpg') }}">
                            <div>
                                <span>+</span>
                            </div>
                    </label>
                        
          </div>

                    <br>
          
          <div class="form group">
              <label>Status</label>
              <div class="form-check">
                <input type="radio" class="form-check-input" name="status" value="yes">
                <label class="form-check-label">
                  Yes
                </label>
                &nbsp; &nbsp; &nbsp;
                <input type="radio" class="form-check-input" name="status" value="no">
                <label class="form-check-label">
                  No
                </label>
              </div>
          </div>
          <br>
          <hr>

          <div class="form group">
              <input type="submit" name="submit" class="btn btn-success" value="Save">
              <button type="button" class="btn btn-default bg-danger text-white" data-dismiss="modal">Close</button>
          </div>

      </form>
</div>
    </div>

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