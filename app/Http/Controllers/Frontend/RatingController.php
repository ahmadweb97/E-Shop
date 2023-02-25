<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\Rating;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RatingController extends Controller
{

/* public function add(Request $request)
{
    $stars_rated = $request->input('product_rating');
    $product_id = $request->input('product_id');

    $product_check = Product::where('id', $product_id)->where('status', '0')->first();

    if ($product_check) {
        $verified_purchase = Order::where('orders.user_id', Auth::id())->join('order_items', 'orders.id', 'order_items.order_id')->where('order_items.product_id', $product_id)->get();

        if( $verified_purchase)
        {
            $existing_rating = Rating::where('user_id', Auth::id())->where('prod_id', $product_id)->first();
            if ( $existing_rating) {

                $existing_rating->$stars_rated;
                $existing_rating->update();


            }
            else{
                Rating::create([
                    'user_id'=> Auth::id(),
                    'prod_id'=> $product_id,
                    'stars_rated' => $stars_rated ,
                ]);

            }

            return redirect()->back()->with('message','Thank you for rating this product!');

        }
        else {
            return redirect()->back()->with('message', 'You need to purchase this product to rate it!');
        }
    }

    else {
        return redirect()->back()->with('message', 'The link was broken!');

    }
} */

}
