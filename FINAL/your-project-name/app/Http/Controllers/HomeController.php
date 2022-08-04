<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
        $productImages=ProductImage::all();
        $parentCategories = Category::where('parent_id',0)->get();

        $product=Product::orderBy('selling_price','ASC')->first();
      

        return view('home',compact('parentCategories','productImages','product'));
    }
}
