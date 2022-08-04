<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
       
      
        if(request()->category_id){
            $category_id=request()->category_id;
           $products=Product::where('category_id',$category_id)->get();
        }
        elseif(request()->brand){
            $brand=request()->brand;
            $products=Product::where('brand',$brand)->get();
        }
        
        else{
            $products=Product::all();
        }
        

        $parentCategories = Category::where('parent_id',0)->get();

        $brands=Brand::all();


       
        return view('landingPage.index',compact('parentCategories','products','brands'));
    }

    public function show(Product $product)
    {
        return view('landingPage.show',compact('product'));
    }
}
