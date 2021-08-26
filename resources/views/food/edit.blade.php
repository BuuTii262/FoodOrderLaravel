<div id="EditModal{{$food->uuid}}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Food</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


      <form action="{{ url('food/'.$food->uuid) }}" method="POST" id="form" enctype="multipart/form-data">
          @csrf
          @method('PUT')
            <div class="form group">
                <label>Food Name</label>
                <input type="text" name="food_name" class="form-control @error('price') is-invalid @enderror" 
                id="name" value="{{$food->name ?? old('food_name')}}">

                @error('food_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                
            </div>
            <br>

            <div class="form-elememt">
            <label>Food Image</label><br>
                        
                        <label>
                            
                            <img src="{{ asset('uploads/foodImage/'.$food->food_image) }}" id="imagePreview">
                           
                            
                        </label>                       
          </div>
          <input type="file" id="inputfile" name="food_image" class="form-control-file">

            <br>

            <div class="form group">
                <label>Select Category</label>
                <select name="category_id" class="form-control form-control @error('category_id') is-invalid @enderror" id="category_id">
                    <option value="{{$food->categories[0]->uuid}}" selected>{{$food->categories[0]->name}}</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->uuid }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <br>

            <div class="form group">
                <label>Price</label>
                <input type="number" name="price" class="form-control form-control form-control @error('category_id') is-invalid @enderror" 
                id="price" value="{{ $food->price ?? old('price') }}">
                @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <br>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" rows="3"
                class="form-control form-control form-control @error('description') is-invalid @enderror" placeholder="Enter Description...">
                {{ $food->description ??  old('description')}}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                
            </div>
            <br>

            <div class="form group">
                <label>Available</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input @error('have') is-invalid @enderror" 
                    name="have" id="availableYes" value="Yes" {{ $food->status == 'Yes' ? 'checked' : '' }}> 
                    <label class="form-check-label" for="availableYes">
                    Yes
                    </label>
                    &nbsp; &nbsp; &nbsp;
                    <input type="radio" class="form-check-input @error('have') is-invalid @enderror" 
                    name="have" id="availableNO" value="No" {{ $food->status == 'No' ? 'checked' : '' }}>
                    <label class="form-check-label" for="availableNO">
                    No
                    </label>
                </div>
                @error('have')
                            <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <br>
            
            <div class="form group">
                <label>Status</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input @error('status') is-invalid @enderror" 
                    name="status" id="statusYes" value="Yes" {{ $food->have == 'Yes' ? 'checked' : '' }}> 
                    <label class="form-check-label" for="statusYes">
                    Yes
                    </label>
                    &nbsp; &nbsp; &nbsp;
                    <input type="radio" class="form-check-input @error('status') is-invalid @enderror" 
                    name="status" id="statusNo" value="No" {{ $food->have == 'No' ? 'checked' : '' }}>
                    <label class="form-check-label" for="statusNo">
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
                <button type="button" class="btn btn-default btn-md text-dark" 
                data-dismiss="modal">Close</button>
            </div>

        </form>
    </div>
</div>

</div>
</div>

<script>
  let inpFile = document.querySelector("#inputfile");
  let imagePreview = document.querySelector("#imagePreview");
  
  inpFile.addEventListener("change" , function(){
    let file = this.files[0];
    if(file){
      const reader = new FileReader();

      imagePreview.style.display = "block";

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