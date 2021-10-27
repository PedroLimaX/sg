@extends('layouts.app')
@section('content')
  <h1>{{ __('Mis pedidos') }}</h1>
   
    <div class="container">
  @if(Session::has('mensaje'))
    <div class="alert alert-success" roler="alert">
    {{ Session::get('mensaje') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>

</div>
@endif
<div class="md-1">
  @foreach( $orders as $order)

  @if((Auth::user()->id==$order->user_id)||(Auth::user()->provider_id==$order->cart->provider_id))
      <div class="card h-100 text-center">
        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
          <label class="mb-1">Pedido nº {{ $order->code}}</label>
          <p class="mb-1">Pedido para: {{ $order->user->name}}</p>
          <i><p class="mb-1">Estado: {{ $order->status}}</p></i>
          <small class="text-muted">Pedido realizado el {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y')}}</small>
        </div>
        <!--{{$total=0}}-->
        @foreach( $carts as $cart)
        @if((($cart->user_id)==Auth::user()->id)||(($cart->provider_id)==Auth::user()->provider_id))
          <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <img src="../storage/app/public/uploads/{{$cart->product->image}}" alt="{{ $cart->product->image}}" width="70px">
              <b><p class="mb-1 text-left"> {{$cart->product->name}}</p></b>
              <small class="text-muted text-right">Subtotal: ${{($cart->quant_product)*($cart->product->price)}} MXN | {{$cart->quant_product}} piezas </small>
              <!--@if(($cart->user->id)==Auth::user()->id) Total: {{ $total = $total + (($cart->quant_product)*($cart->product->price))}} @endif-->
            </div>
          </a>
          @endif
        @endforeach
        <br>
        <div>
          <b><p class="text-muted text-center">@if(($order->user->id)==Auth::user()->id) Total: ${{$total}} MXN @endif</p></b>
        </div>
      </a>
    </div>
    @endif
  @endforeach
</div>
{!! $orders->links()!!}
@endsection