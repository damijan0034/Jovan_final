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
    <div class="col-md-4">
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-4">
          <h2 class="mb-4">Categories</h2>
          <div class="btn-group  btn-group-vertical  dropend">
            <a href="{{ route('landingPage.index') }}" class="btn btn-sm mb-1 btn-secondary">ALL PRODUCTS</a>
            @foreach ($parentCategories as $parentCategory)
            <div class="btn-group">
              <a href="{{ route('landingPage.index',['category_id'=>$parentCategory->id]) }}" type="button"
                class="btn mb-1 btn-secondary">
                {{ $parentCategory->name }}
              </a>
              <button type="button" class="btn mb-1 d-block btn-secondary dropdown-toggle dropdown-toggle-split"
                data-bs-toggle="dropdown" aria-expanded="false">
                <span class="visually-hidden"> </span>
              </button>

              <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                @if(count($parentCategory->subcategory))
                <li><a class="dropdown-item " href="">
                    @include('landingPage.subCategoryList',['subcategories' => $parentCategory->subcategory])
                  </a>
                </li>
                @endif
              </ul>
            </div>


            @endforeach
          </div>

        </div>
        <div class="col-md-6 col-sm-6 col-xs-4">
          <h2 class="mb-4">Brands</h2>
          <div class="btn-group  btn-group-vertical" role="group" aria-label="Basic example">
            <a href="" class="btn btn-sm btn-warning mb-1">all brands</a>
            @foreach ($brands as $brand )
            <a href="{{ route('landingPage.index',['brand'=>$brand->name]) }}" class="btn btn-warning mb-1">{{
              $brand->name }}</a>
            @endforeach
          </div>


        </div>
      </div>

      <!-- Split dropend button -->



    </div>


    <div class="col-md-8">
      <h2>Products</h2>
      <div class="row ">
       
      @foreach ($products as $product)
     
       
        @php
       $firstImage=$product->productImages->first()
        @endphp
      

         <div class=" col-md-4 ">
          <a style="text-decoration: none;color:black" href="{{ route('landingPage.show',[$product->slug]) }}" class=" ">
            <div class="card mb-3" style="width: 12rem;height:10rem">
          
                <img style="height: 300px" src="{{ asset('storage/products/'.$firstImage->image) }}" class=" img-fluid" alt="...">
            
              
              
               <h6>{{ $product->name }}-{{ $product->selling_price }}€ </h6>
            
            
             
              
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