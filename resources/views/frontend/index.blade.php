@extends('layouts.app')

@section('title', 'Home Page')

@section('content')

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">


    <div class="carousel-inner">

        @foreach ($sliders as $key => $sliderItem )

      <div class="carousel-item {{ $key == 0 ? 'active':'0' }} active">

        @if ($sliderItem->image)
        <img src="{{ asset("$sliderItem->image") }}" class="d-block w-100" alt="...">
        @endif

        <div class="carousel-caption d-none d-md-block">
            <div class="custom-carousel-content">
                <h1>
                    {!! $sliderItem->title !!}
                </h1>
                <p>
                    {!! $sliderItem->description !!}
                </p>
                <div>
                    <a href="{{ url('/collections') }}" class="btn btn-slider">
                        Get Now
                    </a>
                </div>
            </div>
        </div>
      </div>
      @endforeach

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


  <div class="py-5 bg-white">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h4>Welcome to E-Shop</h4>
                <div class="underline mx-auto"></div>
                <p>"Welcome to eshop, we provide the best selection of electronics, fashion, home decor, and more! Our products are carefully curated to bring you the latest trends and highest quality items at affordable prices. Browse our collection today and discover the perfect item to fit your lifestyle."</p>
            </div>
        </div>
    </div>
  </div>


  <div class="py-5">

    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h4>Trending Products</h4>
                <div class="underline mb-4"></div>

            </div>

            @if ($trendingProducts)
            <div class="col-md-12">

                <div class="owl-carousel owl-theme fourCarousel">
                @foreach ($trendingProducts as $proItem )

                <div class="item">

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

                    @endforeach
                </div>


            </div>
            @else
            <div class="col-md-12">
                <div class="p-2">
                    <h5 class="alert alert-warning">No products available!</h5>
                </div>
            </div>
            @endif

        </div>
    </div>
  </div>


  <div class="py-5 bg-white">

    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h4>New Arrivals
                    <a href="{{ url('new-arrivals') }}" class="btn btn-warning float-end">View More</a>

                </h4>
                <div class="underline mb-4"></div>

            </div>

            @if ($newArrivalsProducts)
            <div class="col-md-12">

                <div class="owl-carousel owl-theme fourCarousel">
                @foreach ($newArrivalsProducts as $proItem )

                <div class="item">

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

                    @endforeach
                </div>


            </div>
            @else
            <div class="col-md-12">
                <div class="p-2">
                    <h5 class="alert alert-warning">No New Arrivals available!</h5>
                </div>
            </div>
            @endif

        </div>
    </div>
  </div>
  <div class="py-5">

    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h4>Featured Products
                    <a href="{{ url('featured-products') }}" class="btn btn-warning float-end">View More</a>
                </h4>
                <div class="underline mb-4"></div>

            </div>

            @if ($featuredProducts)
            <div class="col-md-12">

                <div class="owl-carousel owl-theme fourCarousel">
                @foreach ($featuredProducts as $proItem )

                <div class="item">

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

                    @endforeach
                </div>


            </div>
            @else
            <div class="col-md-12">
                <div class="p-2">
                    <h5 class="alert alert-warning">No Featured Products available!</h5>
                </div>
            </div>
            @endif

        </div>
    </div>
  </div>



  @endsection


@section('script')

<script>

$('.fourCarousel').owlCarousel({
    loop:false,
    margin:10,
    dots:true,
    nav:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})

</script>

@endsection

