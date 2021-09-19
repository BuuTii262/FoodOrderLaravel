@extends('layouts.master')
@section('content')


<div class="jumbotron text-center bg-dark" style="border-radius: 0px;">
    <h1 class="text-white"><i class='bx bx-user-circle'></i></h1>
    <h3 class="text-white">Roles</h3>
</div>

              
  <div class="table-responsive"> 
        <table class="table table-hover">
            <thead class="bg-dark text-white">
                <tr>
                            
                    <th>ID</th>
                    <th>NAME</th>
                </tr>
            </thead>
            <tbody>

            @foreach($roles as $role)
                            <tr>
                                
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                            </tr>
                            @endforeach
                
            </tbody>

        </table>
  </div>    
  
@endsection