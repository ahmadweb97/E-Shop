@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('status2'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('status2') }}
                        </div>
                    @endif

                    <p class="lead">{{ __('You are logged in!') }}</p>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<style>


</style>

<div class="container p-3">
    <div class="row">
      <div class="col-12 col-md-8 mx-auto ">
        <div class="card">
          <div class="card-header">
            <h1>Welcome  {{ Auth::user()->name }}!</h1>
          </div>
          <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
            @endif
            @if (session('status2'))
            <div class="alert alert-danger" role="alert">
              {{ session('status2') }}
            </div>
            @endif
            <p>You are logged in!
            </p>
            <div>
                <a href="{{ url('collections') }}" class="btn btn-success" title="Continue Shopping">Shop</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection
