<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Rating;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{

    public function index()
    {

        $sliders = Slider::where('status', '0')->get();
        $trendingProducts = Product::where('trending', '1')->latest()->take(15)->get();
        $newArrivalsProducts = Product::latest()->take(14)->get();
        $featuredProducts = Product::where('featured', '1')->latest()->take(14)->get();

        return view('frontend.index', compact('sliders', 'trendingProducts', 'newArrivalsProducts', 'featuredProducts'));

    }

    public function searchProducts(Request $request)
    {
        if ($request->search) {
            $searchProducts = Product::where('name', 'LIKE', '%'.$request->search.'%')->latest()->paginate(15);
            return view('frontend.pages.search', compact('searchProducts'));
        }else {
            return redirect()->back()-with('message', 'Results not found!');
        }

    }

    public function newArrival()
    {
        $newArrivalsProducts = Product::latest()->take(16)->get();
        return view('frontend.pages.new_arrival', compact('newArrivalsProducts'));

    }

    public function featuredProducts()
    {

        $featuredProducts = Product::where('featured', '1')->latest()->get();
        return view('frontend.pages.featured_products', compact('featuredProducts'));

    }


    public function categories()
    {
        $categories = Category::where('status', '0')->get();
        return view('frontend.collections.category.index', compact('categories'));
    }


    public function products($category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if ($category) {




            return view('frontend.collections.products.index', compact('category'));
        }
        else {
            return redirect()->back();
        }
    }



    public function product_view(string $category_slug, string $product_slug )
    {

        $category = Category::where('slug', $category_slug)->first();
        if ($category) {

            $product = $category->products()->where('slug', $product_slug )->where('status', '0')->first();

            if ($product) {




                return view('frontend.collections.products.view', compact('product','category'));
            } else {
                return redirect()->back();
            }
        }
        else {
            return redirect()->back();
        }



    }

    public function thankYou()
    {
        return view('frontend.thank_you');

    }



}
