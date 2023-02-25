<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\Cart;
use App\Models\Order;
use Livewire\Component;
use App\Models\Orderitem;
use Illuminate\Support\Str;
use App\Mail\PlaceOrderMailable;
use Illuminate\Support\Facades\Mail;

class CheckoutShow extends Component
{

    public $carts, $totProdAmount = 0;

    public $fullname, $email, $phone, $pincode, $address, $payment_mode = NULL, $payment_id = NULL;

    protected $listeners = [
        'validationForAll',
        'transactionEmit' => 'paidOnline'
    ];


    public function paidOnline($value)
    {
        $this->payment_id = $value;
        $this->payment_mode = 'Paid by banking card';

        $cashOnDelOrd = $this->placeOrder();
        if ($cashOnDelOrd) {

            Cart::where('user_id', auth()->user()->id)->delete();

            try {
                $order = Order::findOrFail($cashOnDelOrd->id);
                Mail::to("$order->email")->send(new PlaceOrderMailable($order));

            } catch (\Ecxeption $e) {

                //Somethin is wrong!
            }

            session()->flash('message', 'Order placed successfully!');
        $this->dispatchBrowserEvent('message', [
                            'text' => 'Order placed successfully!',
                            'type' => 'success',
                            'status' => 200
                         ]);

            return redirect()->to('thank-you');

        }else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went wrong!',
                'type' => 'error',
                'status' => 500
             ]);
        }

    }

    public function validationForAll()
    {
        $this->validate();

    }

    public function rules()
    {
        return[
            'fullname' => 'required|string|max:121',
            'email' => 'required|email|max:121',
            'phone' => 'required|string|max:12|min:4',
            'pincode' => 'required|string|max:6|min:4',
            'address' => 'required|string|max:500'
        ];

    }

    public function placeOrder()
    {
        $this->validate();
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'tracking_no'=> 'E-Shop '.Str::random(10),
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'pincode' => $this->pincode,
            'address' => $this->address,
            'status_message' => 'In progress',
            'payment_mode' => $this->payment_mode,
            'payment_id' => $this->payment_id
        ]);

        foreach ($this->carts as $cartItem) {

            $orderItems = Orderitem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'product_color_id' => $cartItem->product_color_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->selling_price
            ]);

            if ($cartItem->product_color_id != NULL) {

                $cartItem->productColor()->where('id', $cartItem->product_color_id)->decrement('quantity', $cartItem->quantity);
            }else {
                $cartItem->product()->where('id', $cartItem->product_id)->decrement('quantity', $cartItem->quantity);
            }

        }

        return $order;

    }


    public function cashOnDelOrd()
    {
        $this->payment_mode = 'Cash on delivery';

        $cashOnDelOrd = $this->placeOrder();

        if ($cashOnDelOrd) {

            Cart::where('user_id', auth()->user()->id)->delete();

            try {
                $order = Order::findOrFail($cashOnDelOrd->id);
                Mail::to("$order->email")->send(new PlaceOrderMailable($order));

            } catch (\Ecxeption $e) {

                //Somethin is wrong!
            }

            session()->flash('message', 'Order placed successfully!');
        $this->dispatchBrowserEvent('message', [
                            'text' => 'Order placed successfully!',
                            'type' => 'success',
                            'status' => 200
                         ]);

            return redirect()->to('thank-you');

        }else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went wrong!',
                'type' => 'error',
                'status' => 500
             ]);
        }

    }

    public function totProdAmount()
    {

        $this->totProdAmount = 0;
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();

        foreach ($this->carts as $cartItem) {

            $this->totProdAmount += $cartItem->product->selling_price * $cartItem->quantity;
        }

        return $this->totProdAmount;
    }

    public function render()
    {

        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->phone = auth()->user()->userDetail->phone;
        $this->pincode = auth()->user()->userDetail->pin_code;
        $this->address = auth()->user()->userDetail->address;

        $this->totProdAmount = $this->totProdAmount();
        return view('livewire.frontend.checkout.checkout-show', [
            'totProdAmount' =>  $this->totProdAmount
        ]);
    }
}
