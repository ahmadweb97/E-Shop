<div>

    <div class="row">
        <div class="col-md-3">

            @if ($category->brands)

            <div class="card">
                <div class="card-header">
                    <h4>Brands</h4>
                </div>
                <div class="card-body">

                    @foreach ($category->brands as $brItem)

                    <label class="d-block">
                        <input type="checkbox" wire:model="brandInputs" value="{{ $brItem->name }}"> {{ $brItem->name }}
                    </label>
                    @endforeach
                </div>
            </div>
            @endif


            <div class="card mt-3">
                <div class="card-header">
                    <h4>Price</h4>
                </div>
                <div class="card-body">

                    <label class="d-block">
                        <input type="radio" name="priceSort" wire:model="priceInput" value="high-to-low"> High to low
                    </label>
                    <label class="d-block">
                        <input type="radio" name="priceSort" wire:model="priceInput" value="low-to-high"> Low to high
                    </label>

                </div>
            </div>


        </div>

        <div class="col-md-9">

    <div class="row">

        @forelse ($products as $proItem )

        <div class="col-md-4">
            <div class="product-card">
                <div class="product-card-img">

                    @if ($proItem->quantity > 0)
                    <label class="stock bg-success">In Stock</label>
                    @else
                    <label class="stock bg-danger">Out of stock!</label>

                    @endif

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
        <div class="col-md-12">
            <div class="p-2">
                <h5 class="alert alert-warning">No products available for {{ $category->name }}!</h5>
            </div>
        </div>
        @endforelse

    </div>
</div>
</div>

</div>



