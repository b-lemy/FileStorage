@extends('layouts.master')
@section('menu')
@extends('sidebar.sidebar')
@endsection
@section('content')
<div id="main">
    <header class="mb-1">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify "></i>
        </a>
    </header>
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1">
                <p class="text-subtitle text-muted">Change Password</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 ">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    {{-- message --}}
    {!! Toastr::message() !!}

    <div class="pass_page">
                <div class="pass_page_component">
                    <form method="POST" action="{{ route('change/password/db') }}" class="md-float-material">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-2">
                            <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                            name="current_password" value="{{ old('current_password') }}" placeholder="Enter Old Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group position-relative has-icon-left mb-2">
                            <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                            name="new_password" placeholder="Enter Current Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-2">
                            <input type="password" class="form-control" name="new_confirm_password" placeholder="Confirm Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success btn-block mt-2">Change Password</button>
                    </form>
                </div>


    </div>

</div>
@endsection