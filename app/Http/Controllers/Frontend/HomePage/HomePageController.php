<?php

namespace App\Http\Controllers\Frontend\HomePage;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HomePageController extends Controller
{
    public function index()
    {
        $products = Product::paginate(3);
        return view('frontend.index' , compact('products'));
    }

    public function redirect()
    {
        $products = Product::paginate(3);
        return view('frontend.index' , compact('products'));
    }
}
