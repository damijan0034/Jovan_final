@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Create Category</h2>
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-primary float-end">Add New</a>
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
                     <form action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Name</label>
                              <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                             
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Slug</label>
                              <input type="text" name="slug" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3 ">
                              <input name="image" type="file" class="" id="exampleCheck1">
                              <label class="" for="exampleCheck1">Add Image</label>
                            </div>
                            <div class="mb-3">
                                <select name="parent_id" class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="0">Parent</option>
                                   @foreach ($categories as $category)
                                       <option value="{{ $category->id }}">{{ $category->name }}</option>
                                   @endforeach
                                  </select>
                            </div>

                          
                    
                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </form> 
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
