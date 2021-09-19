@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="margin-top: 70px;">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12 text-center">
                    <i class='bx bx-spa mb-3 p-1 rounded-circle shadow border border-light' style="font-size: 70px;"></i>
                </div>
            </div>
            <div class="card shadow">
                <div class="card-header bg-dark text-white h3 text-center">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-7">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-7">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <div class="col-md-12 text-center mt-2">
                                <button type="submit" class="btn btn-dark">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                Did not have Account?&nbsp;&nbsp;<a href="{{url('register')}}">Register Here</a>&nbsp;&nbsp;&nbsp;
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
