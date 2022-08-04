<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::all();

        return view('admin.categories.index',compact('categories'));
    }

    public function create()
    {
        $categories=Category::all();
        return view('admin.categories.create',compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        $validatedData=$request->validated();

        $category=new Category();

        $category->name=$validatedData['name'];
        $category->slug=Str::slug($validatedData['slug']);
        $category->parent_id=$validatedData['parent_id'];

        if($request->file('image')){
            $file=$request->file('image');

            $imgName=time().'.'.$file->extension();

            $file->move(public_path('/storage'),$imgName);

            $category->image=$imgName;
        }

        $category->save();

        return redirect(route('admin.categories.index'))->with('message','category created successfully');
    }
    
    public function edit(Category $category)
    {
        return view('admin.categories.edit',compact('category'));
    }

    public function update(CategoryRequest $request,Category $category)
    {
        $validatedData=$request->validated();

        $category->name=$validatedData['name'];
        $category->slug=Str::slug($validatedData['slug']);

        if($request->file('image')){
            $path='storage/'. $category->image ;
            if(File::exists($path)){
                File::delete($path);
            }

            $file=$request->file('image');

            $imgName=time().'.'.$file->extension();

            $file->move(public_path('/storage'),$imgName);

            $category->image=$imgName;
        }

        $category->update();

        return redirect(route('admin.categories.index'))->with('message','category updated successfully');
    }

    public function destroy(Category $category)
    {
        
        
            $path='storage/'. $category->image ;
            if(File::exists($path)){
                File::delete($path);
            }
    
        $category->delete();

        return redirect(route('admin.categories.index'))->with('message','category deleted successfully');

        
   

}
}