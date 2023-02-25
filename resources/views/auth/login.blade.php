@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}




<div class="limit">
    <div class="login-container">
        <div class="bb-login">
            <form class="bb-form validate-form" method="POST" action="{{ route('login') }}">
                @csrf
                <span class="bb-form-title p-b-26"> Login </span> <span class="bb-form-title p-b-48"> <i class="mdi mdi-account-key"></i> </span>
                <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">

                    <input id="email" type="email" class="input100  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    <span class="bbb-input" data-placeholder="Email"></span>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                      @enderror
                </div>


                <div class="wrap-input100 validate-input" data-validate="Enter password">


                    <span class="btn-show-pass"> <i class="mdi mdi-eye show_password"></i>
                    </span>

                    <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                    <span class="bbb-input" data-placeholder="Password"></span>


                </div>

                <div class="row mb-3 ">
                    <div class="col-md-6 ">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="login-container-form-btn">
                    <div class="bb-login-form-btn">
                        <div class="bb-form-bgbtn"></div>

                        <button type="submit" class="bb-form-btn">
                            {{ __('Login') }}
                        </button>

                    </div>
                </div>
                <div class="mt-2">
                @if (Route::has('password.request'))
                <a class="btn btn-link text-warning" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
                <div class="text-center p-t-115"> <span class="txt1"> Don&rsquo;t have an account? </span> <a class="txt2 fw-bolder" href="{{ route('register') }}"> Sign Up </a> </div>
            </form>
        </div>
    </div>
</div>


@endsection
