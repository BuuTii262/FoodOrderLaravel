@extends('layouts.master')
@section('content')


<div class="jumbotron text-center bg-dark" style="border-radius: 0px;">
    <a class="text-white h1" href="{{url('/user')}}"><i class="fas fa-users"></i></a>
    <h3 class="text-white">User</h3>
    <div class="d-flex float-right mr-3 mt-3">
        <form action="/searchuser" method="GET">                    
            <div class="input-group class="float-left">
                <input type="text" class="form-control bg-dark text-white border border-white border-top-0 border-left-0 border-right-0" name="search"
                placeholder="Enter name to search" value="{{ old('search') }}">
                <span class="input-group-prepend">
                    <button type="submit" class="btn text-dark bg-white rounded-circle"><i class='bx bx-search-alt'></i></button>
                </span>            
            </div>                    
        </form>
    </div>    
</div>
             
  <div class="table-responsive"> 
        <table class="table table-hover">
            <thead class="bg-dark text-white">
                <tr>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>ROLES</th>
                    @foreach(Auth::user()->roles as $role)
                        @if($role->name == 'Admin')
                            <th>ACTION</th>
                        @endif
                    @endforeach
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
                                @foreach(Auth::user()->roles as $role)
                                    @if($role->name == 'Admin')
                                    <td>
                                        
                                            <!-- <a href="{{ url('/user/'.$user->id.'/edit') }}" class="btn btn-dark btn-sm" >managerole</a> -->                            
                                            <button type="button" class="btn btn-dark btn-sm" 
                                            data-toggle="modal" data-target="#EditRoleModal{{$user->id}}">
                                            <i class="fas fa-edit"></i> Manage Role
                                            </button>

                                            <button type="submit" class="btn btn-danger btn-sm" 
                                            data-toggle="modal" data-target="#DeleteUserModal{{$user->id}}">
                                            <i class="far fa-trash-alt"></i> Delete</button>
                                          
                                            
                                    </td>
                                    @include('user.managerole')
                                    @include('user.delete')

                                    @endif
                                @endforeach
                            </tr>

                            @endforeach
                
            </tbody>

        </table>
        <div class="pagination-block d-flex justify-content-center">
            {{ $users->links('layouts.paginationlink') }}
        </div>
  </div>    
  
@endsection