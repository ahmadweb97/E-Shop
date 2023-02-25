@extends('layouts.app')

@section('title', 'New Arrivals Products')

@section('content')

<div class="py-5">

    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h4>New Arrivals</h4>
                <div class="underline mb-4"></div>

            </div>

            @forelse ($newArrivalsProducts as $proItem )
            <div class="col-md-3">

                    <div class="product-card">
                        <div class="product-card-img">

                            <label class="stock bg-success">New</label>


                            @if ($proItem->productImages->count(0) > 0)

                            <a href="{{ url('/collections/'.$proItem->category->slug.'/'.$proItem->slug) }}">

                           <img src="{{ asset($proItem->productImages[0]->image) }}" alt="{{ $proItem->name }}">
                              </a>

                            @endif

                        </div>
                        <div class="product-card-body">
                            <p class="product-brand">{{ $proItem->brand }}</p>
                            <h5 class="product-name">
                               <a href="{{ url('/collections/'.$proItem->category->slug.'/'.$proItem->slug) }}">
                                   {{ $proItem->name }}
                               </a>
                            </h5>
                            <div>
                                <span class="selling-price">${{ $proItem->selling_price }}</span>
                                <span class="original-price">${{ $proItem->original_price }}</span>
                            </div>

                        </div>
                    </div>
                </div>

                    @empty
                    <div class="col-md-12 p-2">
                        <h5 class="alert alert-warning">No products available!</h5>
                    </div>
                    @endforelse

                    <div class="text-center">
                        <a href="{{ url('collections') }}" class="btn btn-danger px-3">Shop More</a>
                    </div>

        </div>
    </div>
  </div>

@endsection
