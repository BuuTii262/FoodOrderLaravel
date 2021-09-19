@extends('layouts.master')
@section('content')


<div class="jumbotron text-center bg-dark" style="border-radius: 0px;">
    <img src="{{ asset('uploads/userImage/'.$user->user_image) }}" style="width: 60px; height: 60px; border: 1px solid #fff" class="rounded-circle">
    <h3 class="text-white">{{$user->name}}</h3>
</div>

<div class="row">
    <div class="col-md-4"><a class="btn btn-dark btn-sm ml-3" href="{{ URL::previous() }}"><i class='bx bx-left-arrow' ></i> Back</a></div> 
    <div class="col-md-4">
    <h5>Eidt Your Profile</h5>
    <br>
        <form action="{{ url('/user/'.$user->id.'/updateprofile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-elememt">
                <label for="file">Your Image</label><br>
                    <input type="file" id="file-1" name="user_image" 
                    class="form-control">
                    
                <label for="file-1" id="file-1-preview">
                    @if($user->user_image == 'defaultfood.jpg')
                        <img src="{{ asset('defaultPhoto/defaultfood.jpg') }}">
                    @else
                        <img src="{{ asset('uploads/userImage/'.$user->user_image) }}">
                    @endif
                    <div>
                        <span>+</span>
                    </div>
                </label>                       
            </div> 
            <br>         
            <div class="form-group">
                <label class="form-label">Your Name</label>
                <input type="text" class="form-control form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name ?? old('name')}}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label class="form-label">Your Email</label>
                <input type="text" class="form-control form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email ?? old('email')}}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label class="form-label">Your Roles</label>
                <br>
                @foreach($user->roles as $role)
                    <span class="badge badge-info" style="font-size: 17px">{{ $role->name }}</span>
                @endforeach
            </div>
            <br>

            <button class="btn btn-dark btn-md" onclick="return confirm('Are you want to Update Your Profile?')">Update Profile</button>
        </form>
    </div> 
    <div class="col-md-4"></div> 
</div>

<script>

    function previewBeforeUpload(id){
        document.querySelector("#"+id).addEventListener("change",function(e){
            if(e.target.files.length==0){
                return;

            }
            let file = e.target.files[0];
            let url = URL.createObjectURL(file);
            document.querySelector("#"+id+"-preview div").innerText = file.name;
            document.querySelector("#"+id+"-preview img").src = url;

        });
    }
    previewBeforeUpload("file-1");
</script>

@endsection

