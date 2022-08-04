@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 offset-md-2">
           
               
            <div class="card" style="width: 28rem;">
              @php
              $firstImage=$message->product->productImages->where('product_id',$message->product->id)->first()  
               @endphp
                <img src="{{ asset('storage/products/'.$firstImage->image) }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $message->title }}</h5>
                  <p class="card-text">{{ $message->body }}</p>
                  <a href="{{ route('show_message') }}" class="btn btn-primary">Back</a>
                </div>
              </div>
            
        </div>
    </div>
</div>
@endsection
