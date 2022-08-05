@extends('layouts.dashboard')

@section('content')
<div class="row-justify-content-center">
    <div class="col-md-6 offset-md-3 ">
        <div class="container-fluid">

            <div class="card" style="width: 28rem;">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            @php
                            $firstImage=$product->productImages->where('product_id',$product->id)->first()  
                       @endphp
                            <img width="100%" height="300px" src="{{ asset('storage/products/'.($firstImage->image ?? '' )) }}"
                                class="d-block " alt="...">
                        </div>
                        @foreach ($product->productImages as $productImage)
                        <div class="carousel-item">
                            <img width="100%" height="300px" src="{{ asset('storage/products/'.$productImage->image) }}"
                                class="d-block " alt="...">
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->small_description }}</p>
                </div>
                {{-- <ul class="list-group list-group-flush">
                    <li class="list-group-item">An item</li>
                    <li class="list-group-item">A second item</li>
                    <li class="list-group-item">A third item</li>
                </ul> --}}
                <div class="card-body">
{{--                    
                    <form method="post" action="{{ route('product.add_to_cart',[$product]) }}">
                        
                        <input type="hidden"  value="{{ $product->id }}" name="product_id" >
                        <button type="submit" class="btn btn-sm btn-success">Add To Cart</button>
                    </form> --}}

                    <form action="{{ route('product.add_to_cart') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value={{$product['id']}}>
                    <button class="btn btn-primary">Add to Cart</button>
                    </form>
                    
                   
                </div>
            </div>
        
        
        </div>
        
    </div>

</div>





@endsection