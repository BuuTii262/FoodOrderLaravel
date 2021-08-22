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

                    <label>Category Image</label><br>
                        <!-- <input type="file" id="file-2" name="category_image"> -->
                        
                        <label>
                            
                            <img src="{{ asset('/home/saithihaaung/Pictures/FoodOrder/'.$category->category_image) }}" id="imagePreview">
                            <div>
                                <span id="preview-default-text">+</span>
                            </div>
                            
                        </label>                       
          </div>
          <input type="file" id="inputfile" name="category_image" class="form-control-file">

          <br>
          <br>
          
          <div class="form group">
              <label>Status</label>
              <div class="form-check">
                <input type="radio" id="status" class="form-check-input @error('status') is-invalid @enderror" 
                name="status" value="Yes" {{ $category->status == 'Yes' ? 'checked' : '' }} > 
                <label class="form-check-label">
                  Yes
                </label>
                &nbsp; &nbsp; &nbsp;
                <input type="radio" id="status" class="form-check-input @error('status') is-invalid @enderror" 
                name="status" value="No" {{ $category->status == 'No' ? 'checked' : '' }} >
                <label class="form-check-label">
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
  const inpFile = document.querySelector("#inputfile");
  const imagePreview = document.querySelector("#imagePreview");
  const previewText = document.querySelector("#preview-default-text");
  
  inpFile.addEventListener("change" , function(){
    const file = this.files[0]
    if(file){
      const reader = new FileReader();

      imagePreview.style.display = "block";
      previewText.style.display = "none";

      reader.addEventListener("load", function(){
        console.log(this);
        imagePreview.setAttribute("src", this.result);
      });
      reader.readAsDataURL(file);
    }
    else
    {
      imagePreview.style.display = null;
      previewText.style.display = null;
      imagePreview.setAttribute("src", this.result);
    }
  });

</script>