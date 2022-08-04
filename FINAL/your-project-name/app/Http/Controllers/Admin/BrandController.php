<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands=Brand::all();

        return view('admin.brands.index',compact('brands'));
    }

    public function store(BrandRequest $request)
    {
        $validatedData=$request->validated();

        $brand=new Brand();

        $brand->name=$validatedData['name'];
        $brand->slug=Str::slug($validatedData['slug']);

        

        $brand->save();

        return redirect(route('admin.brands.index'))->with('message','category created successfully');
    }
}
