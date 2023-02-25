@extends('layouts.app')

@section('title', 'Thank You!')

@section('content')

<div class="py-3 pyt-md-4" id="bg">

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">

                   @if (session('message'))
                   <h5 class="alert alert-success">
                       {{ (session('message')) }}
                    </h5>
                    @endif
                <div class="p-4 shadow bg-white">
                    <h2>E-Shop Commerce</h2>

                    <div id="image">

                        <img src="{{ asset('uploads/thank_you/thanks.png') }}" alt="">
                    </div>

                    <a href="{{ url('collections') }}" class="btn btn-success" title="Continue Shopping">

                        <i class="fa fa-shopping-basket fa-lg" aria-hidden="true" ></i>
                        </a>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

