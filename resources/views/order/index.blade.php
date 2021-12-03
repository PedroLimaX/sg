@extends('layouts.app')
@section('content')

@if(Auth::user()->rol_id==3)  
<div class="alert alert-info alert-dismissible d-flex align-items-center fade show shadow" roler="alert">
  <i class="fas fa-info-circle"></i>
      <strong class="mx-2">Importante!</strong>Realiza el dep&oacute;sito de tu pedido a la tarjeta
      1234 5678 9012 3456 del banco HSBC<br> Ingresa el c&oacute;digo de tu pedido en la referencia de 
      pago para que el proveedor pueda darle seguimiento a tu pedido
      <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-left:10px">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
@endif

  <h1>{{ __('Mis pedidos') }}</h1>
   
    <div class="container">
  @if(Session::has('success'))
    <div class="alert alert-success" roler="alert">
    {{ Session::get('success') }}
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
          <small class="text-muted">Pedido realizado el {{ \Carbon\Carbon::parse($order->created_at,'America/Mexico_City')->format('d/m/Y')}}</small>
        
        </div>
        @foreach( $carts as $cart)
          @if($cart->code==$order->code)
          @if((($cart->user_id)==Auth::user()->id)||(($cart->provider_id)==Auth::user()->provider_id))
            <a href="{{route('carts.show', $cart->id)}}" class="list-group-item list-group-item-action flex-column align-items-start">
              <div class="d-flex w-100 justify-content-between">
                <img src="../storage/app/public/uploads/imageproducts/{{$cart->product->image}}" alt="{{ $cart->product->image}}" width="70px">
                <b><p class="mb-1 text-left"> {{$cart->product->name}}</p></b>
                <p class="mb-1 text-left"> {{$cart->cartstatus->name}}</p>
                <small class="text-muted text-right">Subtotal: ${{($cart->subtotal)}} MXN | {{$cart->quant_product}} piezas </small>
                
              </div>
              <br>
              <div class="progress">
                @switch($cart->cart_status_id)
                  @case(1)
                    <div class="progress-bar bg-success" role="progressbar" style="width: 16.6%"
                      aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  @break

                  @case(2)
                  <div class="progress-bar bg-success" role="progressbar" style="width: 33.2%"
                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  @break
                  
                  @case(3)
                  <div class="progress-bar bg-success" role="progressbar" style="width: 50%"
                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  @break

                  @case(4)
                  <div class="progress-bar bg-success" role="progressbar" style="width: 66.6%" 
                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  @break
                  
                  @case(5)
                  <div class="progress-bar bg-success" role="progressbar" style="width: 83.2%"
                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  @break

                  @case(6)
                  <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  @break

                  @case(7)
                  
                  @break

                  @case(8)
                  <div class="progress-bar bg-danger" role="progressbar" style="width: 33.2%"
                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  @break
                @endswitch
            </div>
            </a>
            @endif
          @endif
        @endforeach
        <br>
        <div>
          @if(($cart->cart_status_id) < 3)
            <form action="{{ route('orders.destroy',$order->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-primary"><i class="fas fa-ban"></i> Cancelar Pedido</button>
            </form>
          @endif
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
                    <small class="text-muted">Pedido realizado el {{ \Carbon\Carbon::parse($order->created_at,'America/Mexico_City')->format('d/m/Y')}}</small>
                  </div>
                  <a href="{{route('carts.show', $cart->id)}}" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                      <img class="img-rounded" src="../storage/app/public/uploads/imageproducts/{{$cart->product->image}}" alt="{{ $cart->product->image}}" width="70px">
                      <b><p class="mb-1 text-left"> {{$cart->product->name}}</p></b>
                      <p class="mb-1 text-left"> {{$cart->cartstatus->name}}</p>
                      
                      <small class="text-muted text-right">Subtotal: ${{($cart->subtotal)}} MXN | {{$cart->quant_product}} piezas </small>
                    </div>
                  </a>
                  <br>
                  <div>
                    <b><p class="text-center">Total: ${{$cart->subtotal}} MXN </p></b>
                  </div>
                  <br>
              <div class="progress">
                @switch($cart->cart_status_id)
                  @case(1)
                    <div class="progress-bar bg-success" role="progressbar" style="width: 16.6%"
                      aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  @break

                  @case(2)
                  <div class="progress-bar bg-success" role="progressbar" style="width: 33.2%"
                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  @break
                  
                  @case(3)
                  <div class="progress-bar bg-success" role="progressbar" style="width: 50%"
                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  @break

                  @case(4)
                  <div class="progress-bar bg-success" role="progressbar" style="width: 66.6%" 
                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  @break
                  
                  @case(5)
                  <div class="progress-bar bg-success" role="progressbar" style="width: 83.2%"
                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  @break

                  @case(6)
                  <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  @break

                  @case(7)
                  
                  @break

                  @case(8)
                  <div class="progress-bar bg-danger" role="progressbar" style="width: 33.2%"
                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  @break
                @endswitch
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