@extends('layouts.dashboard')

@section('content')
<div class="container">
  <h1 class="text-center m-5">My Carts</h1>
  <table class="table table-borderless">
 
    <tbody>
      @foreach ($carts as $cart)
      <tr>
        <td>
          <form method="POST" action="/payment">
            @csrf

            <input type="hidden" name="amount" value="{{ $cart->product->selling_price }}">
            <button type="submit" class="btn btn-success">BUY</button>
          </form>
        </td>
        <td>{{ $cart->product->name }}</td>
        <td>
          @php
          $firstImage=$cart->product->productImages->where('product_id',$cart->product->id)->first()  
           @endphp
          <img width="100px" height="60px" src="{{ asset('storage/products/'.($firstImage->image ?? '')) }}" alt="">
        </td>
        <td>
          <form action="{{ route('cartdelete',[$cart]) }}" method="post">
            @csrf
            @method('delete')
            <button class="btn btn-warning">Remove </button>
        </form>
        </td>
        <td>
         <a href="/create_message/{{ $cart->product->id }}" class="btn btn-primary">Send Message to Ecomerce</a>
        </td>
      </tr>
      @endforeach
    
     
    </tbody>
  </table>
</div>

@endsection