@extends('layouts.app')
@section('content')
    <div class="register">
        <div class="register_container">
            <div class="logo">
                <img src="{{ URL::to('images/mkcb.png') }}" class=" px-15 max-w-full h-auto w-auto rounded-lg"
                     alt="Logo" srcset="">
            </div>
            <h3 class="logo">Sign Up</h3>
            <p class="auth-subtitle mb-1">Input your data to register to our website.</p>

            <form method="POST" action="{{ route('register') }}" class="md-float-material">
                @csrf
                <div class="form-group position-relative has-icon-left mb-1">
                    <input type="text" class="form-control  @error('name') is-invalid @enderror"
                           name="firstname" value="{{ old('firstname') }}" placeholder="Enter Your FirstName">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>
                <div class="form-group position-relative has-icon-left mb-1">

                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                           name="lastname" value="{{ old('lastname') }}" placeholder="Enter Your LastName">

                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>
                {{-- insert defaults --}}
                <input type="hidden" class="image" name="image" value="photo_defaults.jpg">

                <div class="form-group position-relative has-icon-left mb-1">
                    <input type="text" class="form-control  @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" placeholder="Enter Your Email">
                    <div class="form-control-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>

                <div class="form-group position-relative has-icon-left mb-2">
                    <fieldset class="form-group">
                        <select class="form-select @error('role_name') is-invalid @enderror" name="role_name"
                                data-mce-placeholder="Select role" id="role_name">
                            <option selected disabled>Select Role Name</option>
                            @if ($roles->count() > 0)
                                @foreach($roles as $role)
                                    <option value={{$role->role_type}}>{{$role->role_type}}</option>
                                @endforeach
                            @endif
                        </select>
                        <div class="form-control-icon">
                            <i class="bi bi-exclude"></i>
                        </div>
                    </fieldset>
                    @error('role_name')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>

                <div class="form-group position-relative has-icon-left mb-1">
                    <input type="password" class="form-control input @error('password') is-invalid @enderror"
                           name="password" placeholder="Choose Password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>

                <div class="form-group position-relative has-icon-left mb-1">
                    <input type="password" class="form-control " name="password_confirmation"
                           placeholder="Choose Confirm Password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                </div>
                <button class="btn btn-success btn-block mt-2">Sign Up</button>
            </form>
            <div class="text-center mt-1 ">
                <p class='text-gray-600'>Already have an account? <a href="{{ route('login') }}" class="font-bold">Login</a>.</p>
            </div>

        </div>
    </div>
@endsection

