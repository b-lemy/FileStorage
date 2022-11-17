@extends('layouts.app')
@section('content')
    <div class="login ">
        <div class="login_container">
                <div class="logo">
                    <img src="{{ URL::to('images/mkcb.png') }}" class=" h-auto  rounded-lg"
                     alt="Logo" srcset="">
                </div>
            {{-- message --}}
            {!! Toastr::message() !!}
            <h3 class="logo mt-3">Log In</h3>
            <p class="auth-subtitle">Log in with your data that you entered during registration.</p>
            @if(session()->has('error'))
                <div class="text-danger text-center text-bold">
                    {{ session()->get('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="md-float-material">
                @csrf
                <div class="form-group position-relative has-icon-left mb-2">
                    <input type="text" class="form-control  @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" placeholder="Enter username">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>
                <div class="form-group position-relative has-icon-left mb-1">
                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                           name="password" placeholder="Enter Password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>
                <div class="form-check  d-flex pt-3 align-content-center ">
                    <input class="form-check-input me-2" type="checkbox" value="remember_me" id="remember_me"
                           name="remember_me">
                    <label class="form-check-label border-gray-400 text-gray-600" for="flexCheckDefault">
                        Keep me logged in
                    </label>
                </div>
                <button class="btn btn-primary btn-block  mt-1">Log in</button>
                <div class="bg">
                    <p class="text-gray-600">Don't have an account? <a href="{{route('register')}}" class="font-bold">Sign
                            up</a>.</p>
                    <p><a class="font-bold my-0" href="{{ route('forget-password') }}">Forgot password?</a>.</p>
                </div>
            </form>

        </div>


    </div>
@endsection
