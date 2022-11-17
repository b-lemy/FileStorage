
 @include('layouts.app')

    <div class="reset">

            <div class="reset_container">
                    <div class="logo">
                        <img src="{{ URL::to('images/mkcb.png') }}" class=" h-auto  rounded-lg"
                             alt="Logo" srcset="">
                    </div>
                    <h4 class="logo mt-2">Forgot Password</h4>
                    <p class="auth-subtitle mb-1">
                        Please enter valid email. A new password shall be sent via email.
                        If not received in 5 minutes, kindly contact your system administrator</p>
                    @if (session('message'))
                        <div class="text-success text-center" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <br>
                    <form class="md-float-material" method="POST" action="/forget-password">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-2">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }} " placeholder="Email Address">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success btn-block  mt-2">Send</button>
                    </form>
                    <div class="text-center mt-2">
                        <p class='text-gray-600'>Remember your account? <a href="{{ route('login') }}" class="font-bold">Login</a>.</p>
                    </div>

            </div>


    </div>

