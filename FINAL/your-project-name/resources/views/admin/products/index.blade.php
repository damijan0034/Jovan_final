@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>All Products</h2>
                    <a href="{{ route('admin.products.create') }}" class="btn btn-sm btn-primary float-end">Add New</a>
                </div>

               

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Gallery</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($products as $product)
                                   <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->slug }}</td>
                                    <td>
                                        
                                            <div class="row text-center text-lg-start">
                                                @foreach ($product->productImages as $productImage)
                                          
                                              <div class="col-lg-3 col-md-4 col-6">
                                                <a href="#" class="d-block mb-4 h-100">
                                                  <img width="160" height="140"
                                                   class="img-fluid img-thumbnail" src="{{ asset('storage/products/'.$productImage->image) }}" alt="">
                                                </a>
                                              </div>
                                            
                                             
                                              @endforeach
                                            </div>
                                             
                                    </td>

                                    <td>
                                        
                                        <form action="{{ route('admin.products.destroy',[$product->slug]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>

                                        </form> 
                                    </td>


                                   
                                   
                                   </tr>
                               @endforeach
                            </tbody>
                        </table>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
