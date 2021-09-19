<div id="EditRoleModal{{$user->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Eidt Role</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ url('/user/'.$user->id.'/update') }}" method="POST">
                    @csrf          
                    <div class="form-group">
                        <input type="text" class="form-control" value="{{$user->name}}">
                    </div>
                    <h5>Roles</h5>
                    @foreach($roles as $role)
                    <div class="form-group">
                        <input type="checkbox" name="role_ids[]" value="{{$role->id}}" 
                        id="label{{$role->id}}" 
                        @foreach($user->roles as $userRole)
                            @if($userRole->name == $role->name)
                                checked
                            @endif
                        @endforeach
                        >
                        <label for="label{{$role->id}}">{{ $role->name}}</label>
                    </div>    
                    @endforeach
                    <br>
                    <hr>

                    <div class="form group d-flex justify-content-end">
                        <input type="submit" id="btnAdd" name="submit" class="btn btn-md btn-primary" value="Update">
                        &nbsp;&nbsp;&nbsp; 
                        <button type="button" class="btn btn-default btn-md text-dark" 
                        data-dismiss="modal">Close</button>
                    </div>
                </form>

            </div>
        </div>
  
    </div>
</div>
