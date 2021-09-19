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
                            @if ($food->food_image == 'defaultfood.jpg')
                            <img src="{{ asset('defaultPhoto/defaultfood.jpg') }}" class="imagePreview{{$food->uuid}}">
                                
                            @else
                            <img src="{{ asset('uploads/foodImage/'.$food->food_image) }}" class="imagePreview{{$food->uuid}}">
                                
                            @endif
                           
                            
                        </label>                       
          </div>
          <input type="file" name="food_image" class="inputfile{{$food->uuid}}">

            <br><br>

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
                <label>Have</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input @error('have') is-invalid @enderror" 
                    name="have" id="availableYes{{$food->uuid}}" value="Yes" {{ $food->have == 'Yes' ? 'checked' : '' }}> 
                    <label class="form-check-label" for="availableYes{{$food->uuid}}">
                    Yes
                    </label>
                    &nbsp; &nbsp; &nbsp;
                    <input type="radio" class="form-check-input @error('have') is-invalid @enderror" 
                    name="have" id="availableNO{{$food->uuid}}" value="No" {{ $food->have == 'No' ? 'checked' : '' }}>
                    <label class="form-check-label" for="availableNO{{$food->uuid}}">
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
                    name="status" id="statusYes{{$food->uuid}}" value="Yes" {{ $food->status == 'Yes' ? 'checked' : '' }}> 
                    <label class="form-check-label" for="statusYes{{$food->uuid}}">
                    Yes
                    </label>
                    &nbsp; &nbsp; &nbsp;
                    <input type="radio" class="form-check-input @error('status') is-invalid @enderror" 
                    name="status" id="statusNo{{$food->uuid}}" value="No" {{ $food->status == 'No' ? 'checked' : '' }}>
                    <label class="form-check-label" for="statusNo{{$food->uuid}}">
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
  function previewBeforeUpdate(file,image){
    // console.log(file);
        document.querySelector("."+file).addEventListener("change",function(e){
            if(e.target.files.length==0){
                return;

            }
            let file = e.target.files[0];
            let url = URL.createObjectURL(file);
            document.querySelector("."+image).src = url;

        });
    }
  
  previewBeforeUpdate("inputfile{{$food->uuid}}","imagePreview{{$food->uuid}}");

</script>