@extends('layouts.app')
    @section('content')
        <section class="content container-fluid">
            <a class="btn btn-secondary btn-lg" href="{{ url('orders/') }}">
                <i class="fas fa-chevron-circle-left"></i></a>
            <div class="container">
                <form action="{{ url('/carts/') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PATCH') }}
                    <h1 class="text-break">Pedido No {{$cart->code}}</h1>
                    @if(count($errors)>0)
                        <div class="alert alert-danger" roler="alert">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li> {{ $error }} </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif 
                    <div class="row">
                        <div class="col-sm-4">
                            @if(isset($cart->product->image))
                                <img class="rounded" src="{{asset('../storage/app/public/uploads/'.$cart->product->image)}}" width="350" alt="{{$cart->product->image}}">
                            @endif
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <p class="text-break">{{ $cart->product->name}}</p>
                            </div>
                            <br>
                            
                            <div class="row">
                                <div class="col">
                                    <label for="Stock">Cantidad</label>
                                    <p class="text-break">{{ $cart->quant_product}}</p>
                                </div>

                                <div class="col">
                                    <label for="price">Subtotal</label>
                                    <h3 class="text-break">${{ $cart->subtotal }} MXN</h3>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <label for="materials">Status</label>
                                    <p class="text-break">{{ $cart->cart_status->name }}
                                        <i><span class="text-muted">( {{ $cart->cart_status->details }})</span></i></p> 
                                </div>
                            </div>                            
                            <br>
                        </div>
                    </div>
                    <br>
                    <div class="col-md-3 offset-md-10">
                        @if($cart->cart_status_id<=3)
                            <form action="{{ route('carts.destroy',$cart->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-minus-circle"></i></button>
                            </form>
                            @endif
                    </div>
                    <i class="text-muted" style="font:italic; font-size: 13px">Ultima modificacion
                        {{ \Carbon\Carbon::parse($cart->updated_at)->format('d/m/Y')}}
                        a las {{ \Carbon\Carbon::parse($cart->updated_at)->format('H:i:s')}} hrs</i>
                </form>
            </div>
        </section>
    @endsection
