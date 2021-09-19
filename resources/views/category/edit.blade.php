<div id="EditModal{{$category->uuid}}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Eidt Category</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


      <form action="{{ url('category/'.$category->uuid) }}" method="POST" id="form" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form group">
              <label class="form-label">Category Name</label>
              <input type="text" name="category_name" 
              class="form-control @error('category_name') is-invalid @enderror" id="name" value="{{$category->name ?? old('category_name')}}">
              @error('category_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
          <br>

          <div class="form-elememt">

                    <label>Category Image</label>
                    <br>
                        
                        <label>
                         
                          @if ($category->category_image == 'defaultfood.jpg')
                          <img src="{{ asset('defaultPhoto/defaultfood.jpg') }}" class="imagePreview{{$category->uuid}}">   
                          @else
                          <img src="{{ asset('uploads/categoryImage/'.$category->category_image) }}" class="imagePreview{{$category->uuid}}">  
                          @endif
                          
                            
                        </label>                       
          </div>
          <input type="file" name="category_image" class="inputfile{{$category->uuid}}">

          <br>
          <br>
          
          <div class="form group">
              <label>Status</label>
              <div class="form-check">
                <input type="radio" id="statusYes{{$category->uuid}}" class="form-check-input @error('status') is-invalid @enderror" 
                name="status" value="Yes" {{ $category->status == 'Yes' ? 'checked' : '' }} > 
                <label class="form-check-label" for="statusYes{{$category->uuid}}">
                  Yes
                </label>
                &nbsp; &nbsp; &nbsp;
                <input type="radio" id="statusNo{{$category->uuid}}" class="form-check-input @error('status') is-invalid @enderror" 
                name="status" value="No" {{ $category->status == 'No' ? 'checked' : '' }} >
                <label class="form-check-label" for="statusNo{{$category->uuid}}">
                  No
                </label>
              </div>
              @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>
          <br>
          <hr>

          <div class="form group d-flex justify-content-end">
              <input type="submit" id="btnAdd" name="submit" class="btn btn-md btn-warning" value="update">
              &nbsp;&nbsp;&nbsp; 
              <button type="button" class="btn btn-default text-dark " 
              data-dismiss="modal">Close</button>
          </div>

      </form>
</div>
    </div>
  
</div>
</div>

<script>

  function previewBeforeUpdate(file,image){

        document.querySelector("."+file).addEventListener("change",function(e){
            if(e.target.files.length==0){
                return;

            }
            let file = e.target.files[0];
            let url = URL.createObjectURL(file);
            document.querySelector("."+image).src = url;
            

        });
    }
  
  previewBeforeUpdate("inputfile{{$category->uuid}}","imagePreview{{$category->uuid}}");

</script>