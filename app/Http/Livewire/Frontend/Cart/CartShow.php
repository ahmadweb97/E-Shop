<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use Livewire\Component;

class CartShow extends Component
{

    public $cart, $totalPrice = 0;


    public function decQty(int $cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();

        if ($cartData) {
            if ($cartData->quantity > 1) { // Check if quantity is greater than 1
                $cartData->decrement('quantity');

                $this->dispatchBrowserEvent('message', [
                    'text' => 'Quantity updated decreased!',
                    'type' => 'success',
                    'status' => 200
                ]);
            } else {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Minimum quantity is 1!',
                    'type' => 'error',
                    'status' => 400
                ]);
            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went wrong!',
                'type' => 'error',
                'status' => 404
            ]);
        }
    }


    public function incQty(int $cartId)
    {
        $cartData = Cart::where('id',  $cartId)->where('user_id', auth()->user()->id)->first();

        if ($cartData) {

            if ($cartData->productColor()->where('id', $cartData->product_color_id)->exists()) {

                $productColor = $cartData->productColor()->where('id', $cartData->product_color_id)->first();

                if ($productColor->quantity > $cartData->quantity) {

                    $cartData->increment('quantity');

                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Quantity updated increased!',
                        'type' => 'success',
                        'status' => 200
                     ]);
                }else {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Only '.$productColor->quantity.' quantity available!',
                        'type' => 'success',
                        'status' => 200
                     ]);
                }

            }

            else {
                if ($cartData->product->quantity > $cartData->quantity) {

                    $cartData->increment('quantity');

                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Quantity updated increased!',
                        'type' => 'success',
                        'status' => 200
                     ]);
                    }else {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Only '.$cartData->product->quantity.' quantity available!',
                            'type' => 'success',
                            'status' => 200
                         ]);
                    }
            }



        }
        else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went wrong!',
                'type' => 'error',
                'status' => 404
             ]);
        }

    }

    public function removeCartItem(int $cartId)
    {
        $cartRemove = Cart::where('user_id', auth()->user()->id)->where('id', $cartId)->first();

        if ($cartRemove) {
            $cartRemove->delete();

            $this->emit('cartAdd_Update');

            $this->dispatchBrowserEvent('message', [
                'text' => 'Cart item removed!',
                'type' => 'success',
                'status' => 200
             ]);

        }else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went wrong!',
                'type' => 'error',
                'status' => 500
             ]);
        }

    }

    public function render()
    {
        $this->cart = Cart::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.cart.cart-show', [
            'cart' => $this->cart
        ]);
    }
}
