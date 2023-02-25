@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 --}}

<div class="limit">
    <div class="login-container">
        <div class="bb-login">
            <form class="bb-form validate-form" method="POST" action="{{ route('register') }}">
                @csrf


                <span class="bb-form-title p-b-26"> Register </span> <span class="bb-form-title p-b-48"> <i class="mdi mdi-account-plus"></i> </span>

                <div class="wrap-input100 validate-input" data-validate="Enter Name">



                    <input id="name" type="text" class="input100 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    <span class="bbb-input" data-placeholder="Name"></span>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
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



                    <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                   @enderror

                    <span class="bbb-input" data-placeholder="Password"></span>


                </div>
                <div class="wrap-input100 validate-input" data-validate="confirm password">



                    <input id="password-confirm" type="password" class="input100" name="password_confirmation" required autocomplete="new-password">
                    @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                   @enderror

                    <span class="bbb-input" data-placeholder="Confirm Password"></span>


                </div>


                <div class="login-container-form-btn">
                    <div class="bb-login-form-btn">
                        <div class="bb-form-bgbtn"></div>

                        <button type="submit" class="bb-form-btn">
                            {{ __('Register') }}
                        </button>

                    </div>
                </div>

                <div class="text-center p-t-115"> <span class="txt1"> Already have an account? </span> <a class="txt2 fw-bolder" href="{{ route('login') }}"> Login </a> </div>
            </form>
        </div>
    </div>
</div>



@endsection
