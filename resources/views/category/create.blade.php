<div id="AddModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Category</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


      <form action="{{ url('category') }}" method="POST" id="form" enctype="multipart/form-data">
          @csrf
          <div class="form group">
              <label>Category Name</label>
              <input type="text" name="category_name" value="{{old('category_name')}}"
              class="form-control @error('category_name') is-invalid @enderror" id="name">
              @error('category_name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>
          <br>

          <div class="form-elememt">
                    <label for="file">Category Image</label><br>
                        <input type="file" id="file-1" name="category_image" 
                        class="form-control">
                        
                        <label for="file-1" id="file-1-preview">
                            <img src="{{ asset('defaultPhoto/defaultfood.jpg') }}">
                            <div>
                                <span>+</span>
                            </div>
                    </label>                       
          </div>
          
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