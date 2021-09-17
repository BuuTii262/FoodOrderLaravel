  
  <!-- Modal -->
  <div class="modal fade" id="DeleteUserModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Delete User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <p class="text-danger">Are you sure want to delete this User !</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">&times; Close</button>
          <form action="{{ url('user/'.$user->id.'/delete') }}" method="POST">
            @csrf
            @method('DELETE') 
                
                <button type="submit" class="btn btn-danger">
                <i class='bx bx-trash'></i> Delete</button>
            </form>
        </div>
      </div>
    </div>
  </div>