@extends('layouts.master')
@section('content')


<div class="jumbotron text-center bg-dark" style="border-radius: 0px;">
    <h1 class="text-white"><i class='bx bx-user-circle'></i></h1>
    <h3 class="text-white">Users</h3>
</div>
             
  <div class="table-responsive"> 
        <table class="table table-hover">
            <thead class="bg-dark text-white">
                <tr>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>ROLES</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>

            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                @if(empty($user->roles[0]))
                                    <p class="text-danger">No Role</p>
                                @else
                                    @foreach($user->roles as $role)
                                    <span class="badge badge-dark">{{ $role->name }}</span>
                                    @endforeach
                                        
                                @endif
                                </td>
                                <td>
                                    <!-- <a href="{{ url('/user/'.$user->id.'/edit') }}" class="btn btn-dark btn-sm" >managerole</a> -->
                                @foreach(Auth::user()->roles as $role)
                                    @if($role->name == 'Admin')
                                        <button type="button" class="btn btn-dark btn-sm" 
                                            data-toggle="modal" data-target="#EditRoleModal{{$user->id}}">
                                            Manage Role
                                        </button>
                                    @endif
                                @endforeach    
                                </td>
                                @include('user.managerole')
                            </tr>

                            @endforeach
                
            </tbody>

        </table>
  </div>    
  
@endsection