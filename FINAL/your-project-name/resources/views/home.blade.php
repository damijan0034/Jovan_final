@extends('layouts.dashboard')

@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul style="margin-left: 340px;color:#F3C50F" class="navbar-nav  mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('landingPage.index') }}">ALL PRODUCTS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">BLOG</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>


      </ul>

    </div>
  </div>
</nav>
<div class="container">
  <div class="row">
    <div style="margin-top:100px;" class="col-md-6  ">

      <div class="card ">

        <div class="card-body">
         
          <h1 class="card-title text-center ">The Best Choise</h1>
          @if (isset($product->productImages))
          @foreach ($product->productImages  as $productImage)
         

         
          <img class="" width="60px" height="30px" src="{{ asset('storage/products/'.$productImage->image)}}" alt="">
          
         
      @endforeach
      @endif
      @if (isset($product->selling_price))
          <h3><span class="badge bg-danger rounded-pill float-end">{{ $product->selling_price }}€</span></h3> 
      @endif

      @if (isset($product->name))
      <p class="text-muted card-text">{{ $product->name }}</p> 
      @endif
      
       
          
          
         
          
          <form action="{{ route('product.add_to_cart') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value={{$product['id'] ?? ''}}>
        <button class="btn btn-outline-secondary">Add to Cart</button>
        </form>
          

        </div>

      </div>
    </div>

    <div class="col-md-6">
      <img width="100%" src="{{ asset('img/backround2.jpg') }}" alt="">
    </div>

  </div>

{{-- carousel --}}
<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    
    
    <div class="carousel-item active">
      {{-- @php
      $image=$productImages[0];
  @endphp --}}
 
      <img width="30%" height="20%" src="{{ asset('storage/products/'.(($productImages[0]->image) ?? '')) }}" alt="...">
    </div>

    @foreach ($productImages as $productImage)
    <div class="carousel-item">
      <img width="30%" height="20%" src="{{ asset('storage/products/'.($productImage->image)) }}" class="d-block " alt="...">
    </div>
    @endforeach
  
  
  </div>
</div>





  {{-- end carousel --}}





</div>


</div>



@endsection