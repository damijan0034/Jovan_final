@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Create Product</h2>
                    <a href="{{ route('admin.products.create') }}" class="btn btn-sm btn-primary float-end">Add New</a>
                </div>

               

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                               
                                    {{ $error }}
                               
                               
                            @endforeach
                        </div>    
                    @endif
                     <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image" type="button" role="tab" aria-controls="image" aria-selected="false">Product Image</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab" aria-controls="details" aria-selected="false">Details</button>
                        </li>
                    </ul>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="mb-3">
                                <label for="category">Category</label>
                                <select  value="{{ old('category_id','') }}" name="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{old('category', $category->slug) }}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Product Name</label>
                                <input value="{{ old('name','') }}" name="name" type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Product Slug</label>
                                <input  value="{{ old('slug','') }}" name="slug" type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Brand</label>
                                <select name="brand" class="form-control">
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Small Description</label>
                                <textarea   class="form-control" name="small_description"  rows="4"> {{ old('small_description','') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for=""> Description</label>
                                <textarea   class="form-control" name="description"  rows="4"> {{ old('description','') }}</textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="image" role="tabpanel" aria-labelledby="image-tab">
                            <div class="mb-3">
                                <label for="">Product Images</label>
                                <input  value="{{ old('image','') }}" type="file" name="image[]" class="form-control" multiple >
                            </div>
                        </div>
                        <div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="details-tab">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Original Price</label>
                                        <input  value="{{ old('original_price','') }}" name="original_price" type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Selling Price</label>
                                        <input  value="{{ old('selling_price','') }}" name="selling_price" type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Quantity</label>
                                        <input  value="{{ old('quantity','') }}" name="quantity" type="number" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>

                      <div>
                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </form> 
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
