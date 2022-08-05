<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function index()
    {
        $products=Product::all();
        return view('admin.products.index',compact('products'));
    }

    public function create()
    {
        $categories=Category::all();
        $brands=Brand::all();
        return view('admin.products.create',compact('categories','brands'));
    }

    public function store(ProductFormRequest $request)
    {
        $validatedData=$request->validated();

        $category=Category::findOrFail($validatedData['category_id']);

        $product=$category->products()->create([
            'category_id'=>$validatedData['category_id'],
            'name'=>$validatedData['name'],
            'slug'=>Str::slug($validatedData['slug']),
            'small_description'=>$validatedData['small_description'],
            'description'=>$validatedData['description'],
            'original_price'=>$validatedData['original_price'],
            'brand'=>$validatedData['brand'],
            'selling_price'=>$validatedData['selling_price'],
            'quantity'=>$validatedData['quantity'],
        ]);

        if ($request->file('image')) {
            $images=$request->file('image');

            $i=1;
            foreach($images as $image){
                $imageName=time() .$i++.'.'. $image->extension();

                // Image::make($image)->resize(300,200)->save(public_path('/storage/products'),$imageName);
                // $image->resize(110, 110, function ($const) {
                //     $const->aspectRatio();
                // });
                $image->move(public_path('/storage/products'),$imageName);

                $product->productImages()->create([
                    'product_id'=>$product->id,
                    'image'=>$imageName
                ]);
            }
        }

        return redirect(route('admin.products.index'));


    }

    
    public function destroy(Product $product)
    {
        
        foreach($product->productImages as $productImage){
            $path='storage/products/'. $productImage->image ;
            if(File::exists($path)){
                File::delete($path);
            }
        }
            
    
        $product->delete();

        return redirect(route('admin.products.index'))->with('message','category deleted successfully');
}


public function addToCart(Request $request)
{
    Cart::create([
        'user_id'=>auth()->user()->id,
        'product_id'=>$request->product_id
    ]);

    
   
    return redirect('/landing_page',)->with('message','item added to cart');
}

public function cartList()
     {
         $carts=Cart::where('user_id',auth()->user()->id)->get();
         return view('landingPage.cart_list',compact('carts'));
     }

     public function cartDelete(Cart $cart)
     {
        $cart->delete();

        return redirect()->back();
     }

     
     static function cartNumber()
     {
       

        return  Cart::where('user_id',auth()->user()->id)->count();
     }

     public function search(Request $request)
     {
        $products=Product::where('name','like','%'.$request->search.'%')
                            ->orWhere('brand','like','%'.$request->search.'%')
                            ->orWhere('selling_price','like','%'.$request->search.'%')

                            ->get();

        return view('search',compact('products'));
     }
}