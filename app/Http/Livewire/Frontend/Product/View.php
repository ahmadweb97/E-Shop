<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class View extends Component
{

    public $category, $product, $prodColSelQty, $quantityCount = 1, $productColorId;




    public function addToWishList($productId)
    {

        if(Auth::check()){

            if(Wishlist::where('user_id', auth()->user()->id)->where('product_id',$productId)->exists())
            {
                session()->flash('message', 'Already added to wishlist!');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Already added to wishlist!',
                    'type' => 'warning',
                    'status' => 409
                 ]);
                return false;
            }
            else{
              Wishlist::create([
                'user_id' => auth()->user()->id,
                'product_id' => $productId
            ]);

            $this->emit('wishlistAdd_Update');
            session()->flash('message', 'Product added to wishlist successfully!');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Product added to wishlist successfully!',
                'type' => 'success',
                'status' => 200
             ]);
        }

        }

        else {
            session()->flash('message', 'Please login to continue');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please login to continue',
                'type' => 'info',
                'status' => 401
             ]);
            return false;
        }
    }


    public function colorSelected($productColorId)
    {

        $this->productColorId = $productColorId;
        $productColor = $this->product->productColors()->where('id', $productColorId)->first();
        $this->prodColSelQty = $productColor->quantity;

        if ($this->prodColSelQty == 0) {
            $this->prodColSelQty = 'outOfStock';
        }
    }

    public function decQty()
    {
        if($this->quantityCount > 1){

            $this->quantityCount--;
        }

    }
    public function incQty()
    {
        if($this->quantityCount < 100){

            $this->quantityCount++;
        }

    }

    public function addToCart(int $productId)
    {
        if (Auth::check()) {

            if ($this->product->where('id', $productId)->where('status', '0')->exists()) {
                // check for product color qty/add to cart
                if ($this->product->productColors()->count() > 1) {
                    if ($this->prodColSelQty != NULL) {

                        if (Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)
                        ->where('product_color_id', $this->productColorId)
                        ->exists())

                        {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Already added to cart!',
                                'type' => 'warning',
                                'status' => 200
                             ]);
                        }

                        else {


                        $productColor = $this->product-> productColors()->where('id', $this->productColorId)->first();

                        if ($productColor->quantity > 0) {

                            if ($productColor->quantity > $this->quantityCount){

                                Cart::create([
                                    'user_id' => auth()->user()->id,
                                    'product_id' => $productId,
                                    'product_color_id' => $this->productColorId,
                                    'quantity' => $this->quantityCount
                                ]);

                                $this->emit('cartAdd_Update');
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Product added to cart!',
                                    'type' => 'success',
                                    'status' => 200
                                 ]);

                            }
                            else{
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Only '.$productColor->quantity.' quantity available!',
                                    'type' => 'warning',
                                    'status' => 404
                                 ]);
                            }

                        }
                        else {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Select your product color!',
                                'type' => 'info',
                                'status' => 404
                             ]);
                        }
                    }

                    }

                    else {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Select your product color!',
                            'type' => 'info',
                            'status' => 404
                         ]);
                    }

                }

                else{

                    if (Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {

                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Already added to cart!',
                            'type' => 'warning',
                            'status' => 200
                         ]);
                    }

                    else {



                if ($this->product->quantity > 0) {

                    if ($this->product->quantity > $this->quantityCount){
                        // add to cart product without colors

                        Cart::create([
                            'user_id' => auth()->user()->id,
                            'product_id' => $productId,
                            'quantity' => $this->quantityCount
                        ]);

                        $this->emit('cartAdd_Update');

                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Product added to cart!',
                            'type' => 'success',
                            'status' => 200
                         ]);

                    }
                    else{
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Only '.$this->product->quantity.' quantity available!',
                            'type' => 'warning',
                            'status' => 404
                         ]);
                    }

                }

                else{
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Out of stock!',
                        'type' => 'warning',
                        'status' => 404
                     ]);
                }
            }


            }


            }
            else {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product does not exists!',
                    'type' => 'warning',
                    'status' => 404
                 ]);
            }
        }
        else{
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please login to add to cart!',
                'type' => 'info',
                'status' => 401
             ]);
        }

    }


    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;

    }

    public function render()
    {
        return view('livewire.frontend.product.view', [
            'category' => $this->category,
            'product' => $this->product,
        ]);
    }
}
