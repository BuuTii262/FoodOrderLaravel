@extends('layouts.master')
@section('content')


<div class="jumbotron text-center bg-dark" style="border-radius: 0px;">
    <h1 class="text-white"><i class='bx bx-user-circle'></i></h1>
    <h3 class="text-white">Edit User Role</h3>
</div>

<div class="row">
    <div class="col-md-3"></div> 
    <div class="col-md-6">
    <h5>Users</h5>
        <form action="{{ url('/user/'.$user->id.'/update') }}" method="POST">
            @csrf          
            <div class="form-group">
                <input type="text" class="form-control" value="{{$user->name}}">
            </div>
            <h5>Roles</h5>
            @foreach($roles as $role)
            <div class="form-group">
                <input type="checkbox" name="role_ids[]" value="{{$role->id}}" 
                id="label {{$role->id}}" 
                @foreach($user->roles as $userRole)
                    @if($userRole->name == $role->name)
                        checked
                    @endif
                @endforeach
                >
                <label for="label {{$role->id}}">{{ $role->name}}</label>
            </div>    
            @endforeach
            <br>
            <button class="btn-primary">Add Role</button>
        </form>
    </div> 
    <div class="col-md-3"></div> 
</div>

@endsection

