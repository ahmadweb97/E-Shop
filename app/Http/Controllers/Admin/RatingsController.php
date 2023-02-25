<?php

namespace App\Http\Controllers\Admin;

use App\Models\Rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class RatingsController extends Controller
{
    public function ratings()
    {
     Session::put('page', 'ratings');
     $ratings = Rating::with(['user','product'])->get()->toArray();
     //dd($ratings);
        return view('admin.ratings.ratings')->with(compact('ratings'));
     }
}
