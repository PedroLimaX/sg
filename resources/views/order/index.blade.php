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
  @if(Auth::user()->id==$order->user_id)
    <div class="card h-100 text-center" style="margin-top:20px">
        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
          <b><p class="mb-1">Pedido nº {{ $order->code}}</p></b>
          <p class="mb-1"><i>Envio para</i>
            <b>{{ $order->user->name}}</b> |
            <i class=" text-muted fas fa-map-marker-alt"></i>
              {{$order->user->address}}</p>
          <small class="text-muted">Pedido realizado el {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y')}}</small>
        </div>
        @foreach( $carts as $cart)
          @if($cart->code==$order->code)
          @if((($cart->user_id)==Auth::user()->id)||(($cart->provider_id)==Auth::user()->provider_id))
            <a href="{{route('carts.show', $cart->id)}}" class="list-group-item list-group-item-action flex-column align-items-start">
              <div class="d-flex w-100 justify-content-between">
                <img src="../storage/app/public/uploads/{{$cart->product->image}}" alt="{{ $cart->product->image}}" width="70px">
                <b><p class="mb-1 text-left"> {{$cart->product->name}}</p></b>
                <p class="mb-1 text-left"> {{$cart->cart_status->name}}</p>
                <small class="text-muted text-right">Subtotal: ${{($cart->subtotal)}} MXN | {{$cart->quant_product}} piezas </small>
              </div>
            </a>
            @endif
          @endif
        @endforeach
        <br>
        <div>
          <b><p class="text-muted text-center">Total: ${{$order->total}} MXN </p></b>
        </div>
      </a>
    </div>
      @else
      
        @foreach( $carts as $cart)
          @if($cart->code==$order->code)
            @if((($cart->user_id)==Auth::user()->id)||(($cart->provider_id)==Auth::user()->provider_id))
            
              <div class="card h-100 text-center" style="margin-top:20px">
                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                  <div class="d-flex w-100 justify-content-between">
                    <b><p class="mb-1">Pedido nº {{ $order->code}}</p></b>
                    <p class="mb-1"><i>Envio para</i>
                    <b>{{ $order->user->name}}</b> |
                    <i class=" text-muted fas fa-map-marker-alt"></i>
                      {{$order->user->address}}</p>
                    <small class="text-muted">Pedido realizado el {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y')}}</small>
                  </div>
                  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                      <img src="../storage/app/public/uploads/{{$cart->product->image}}" alt="{{ $cart->product->image}}" width="70px">
                      <b><p class="mb-1 text-left"> {{$cart->product->name}}</p></b>
                      <p class="mb-1 text-left"> {{$cart->cart_status->name}}</p>
                      
                      <small class="text-muted text-right">Subtotal: ${{($cart->subtotal)}} MXN | {{$cart->quant_product}} piezas </small>
                    </div>
                  </a>
                  <br>
                  <div>
                    <b><p class="text-center">Total: ${{$cart->subtotal}} MXN </p></b>
                  </div>
                </a>
            </div>
            @endif
          @endif
        @endforeach
      @endif
  @endforeach
</div>
{!! $orders->links()!!}
@endsection