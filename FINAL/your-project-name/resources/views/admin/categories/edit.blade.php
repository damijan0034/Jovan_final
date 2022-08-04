@extends('layouts.admin')

@section('content')

    <h1>Edit Category</h1><br>
    <div class="row">
        <div class="col-md-9 ">
            <form action="{{ route('admin.categories.update',[$category->slug]) }}" method="POST" class="form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <input value="{{ old('name',$category->name) }}" type="text" name="name" class="form-input">
                    </div>
                    <div class="col-md-6">
                        <input value="{{ old('slug',$category->slug) }}" type="text" name="slug" class="form-input">
                    </div>
                </div>
              
                <div class="row">
                    <input name="image" type="file" class="form-input">
                    <img width="100" height="60" src="{{ asset('storage/'.$category->image) }}" alt="">
               </div>
               
                <button class="primary-default-btn">Edit</button>
               </form>
        </div>
    </div>
  
    
@endsection