@extends('layouts.dashboard')

@section('content')
<div class="container">
  <h1 class="text-center m-5">All Payments</h1>
  <table class="table table-borderless">
 
    <tbody>
      <tr>
        <th>Payer Email</th>
        <th>Payment ID</th>
        <th>Amount</th>
        <th>Currency</th>
        <th>Time</th>
      </tr>
      @foreach ($payments as $payment)
      <tr>
        <td>{{ $payment->payer_email }}</td>
        <td>
            {{ $payment->payment_id }}
        </td>
        <td>
          {{ $payment->amount }}
        </td>
        <td>
          {{ $payment->currency }}
        <td>
          {{ $payment->created_at }}
        </td>
      </tr>
      @endforeach
    
     
    </tbody>
  </table>
</div>

@endsection