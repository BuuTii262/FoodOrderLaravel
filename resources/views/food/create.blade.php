<div id="AddModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Food</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


      <form action="{{ url('food') }}" method="POST" id="form" enctype="multipart/form-data">
            @csrf
            <div class="form group">
                <label>Food Name</label>
                <input type="text" name="food_name" 
                class="form-control @error('food_name') is-invalid @enderror" id="name">
                @error('food_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
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
                        <img src="{{ asset('defaultPhoto/defaultfood.jpg') }}">
                        <div>
                            <span>+</span>
                        </div>
                    </label>                       
            </div>
            <br>

            <div class="form group">
                <label>Select Category</label>
                <select name="category_id" class="form-control" id="category_id">
                    <option value="" selected disabled>Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->uuid }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <br>

            <div class="form group">
                <label>Price</label>
                <input type="number" name="price" class="form-control" id="price">
            </div>
            <br>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" rows="3"
                class="form-control @error('description') is-invalid @enderror" placeholder="Enter Description...">
                {{ old('description') }}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <br>

            <div class="form group">
                <label>Have</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input @error('have') is-invalid @enderror" 
                    name="have" value="Yes" checked> 
                    <label class="form-check-label">
                    Yes
                    </label>
                    &nbsp; &nbsp; &nbsp;
                    <input type="radio" class="form-check-input @error('have') is-invalid @enderror" 
                    name="have" value="No">
                    <label class="form-check-label">
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
                    name="status" value="Yes" checked> 
                    <label class="form-check-label">
                    Yes
                    </label>
                    &nbsp; &nbsp; &nbsp;
                    <input type="radio" class="form-check-input @error('status') is-invalid @enderror" 
                    name="status" value="No">
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
                <input type="submit" name="submit" class="btn btn-success btn-md" value="Save">
                &nbsp;&nbsp;&nbsp; 
                <button type="button" class="btn btn-default btn-md text-dark" 
                data-dismiss="modal">Close</button>
            </div>

        </form>
    </div>
</div>

</div>
</div>