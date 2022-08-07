@extends('layouts.dashboard')

@section('content')



<div class="row">
  <div class="col-md-6 offset-md-3">
    <form action="/search" class="mb-5" method="GET">
      @csrf

      <input style="padding:7px;border-radius:5px; width:70%;text-align:center;border:1px solid gray" type="search"
        placeholder="SEARCH" name="search" aria-label="Search">


      <button style="margin-left: 30px; border:1px solid gray" class="btn btn-outline-secondary"
        type="submit">GO</button>
    </form>

  </div>


</div>

<div class="container-fluid">


  <div class="row">
  

    <div class="col-md-8">
      
        <a href="{{ route('landingPage.index') }}" class="btn btn-sm btn-primary mb-5"> All Products</a>
       
      <div class="row ">
       
      @foreach ($products as $product)
     
       
        @php
       $firstImage=$product->productImages->first()
        @endphp
      

         <div class=" col-md-4 ">
          <a style="text-decoration: none;color:black" href="{{ route('landingPage.show',[$product->slug]) }}" class=" ">
            <div class="card mb-3" style="width: 12rem;height:10rem">
          
              <img style="height: 300px" src="{{ asset('storage/products/'.$firstImage->image) }}" class=" img-fluid" alt="...">
          
            
            
             <h6>{{ $product->name }}</h6>
             <span class="badge bg-danger rounded-pill float-end">{{ $product->selling_price }}€</span>
          
           
            
          </div>
          </a>
        </div>
      
      @endforeach
      
    </div>
    </div>
    {{--
    <footer>
      <div class="row">
        <div class="col-9">
          <div style="margin: 40px" class="container">
            <div class="row">
              <div style="text-align:center" class="col-3">
                <h6>COMPANY</h6>
                <ul style=" list-style: none;color:gray;text-align:center;font-size:14px;">
                  <li>Product</li>
                  <li>Work here</li>
                  <li></li>
                  <li></li>
                </ul>
              </div>
              <div class="col-3">
                <h6>SERVICE</h6>
              </div>
              <div class="col-3">
                <h6>ORDER</h6>
              </div>
              <div class="col-3">
                <h6>LEGAL</h6>
              </div>
            </div>
          </div>

        </div>
        <div class="col-3"></div>
      </div>
    </footer> --}}

    @endsection