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
                                <img class="rounded" src="{{asset('../storage/app/public/uploads/imageproducts/'.$cart->product->image)}}" width="350" alt="{{$cart->product->image}}">
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
                                    <p class="text-break">{{ $cart->cartstatus->name }}
                                        <i><span class="text-muted">( {{ $cart->cartstatus->details }})</span></i></p>
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
                                </div>
                                
                            </div>                            
                            <br>
                        </div>
                    </div>
                    <br>
                    <div class="col-md-3 offset-md-10">
                        @if(Auth::user()->rol_id==3)
                        @elseif(Auth::user()->rol_id==2)
                            <a href="{{ route('carts.edit',$cart->id) }}" class="btn btn-tertiary btn-lg"><i class="fa fa-fw fa-edit"></i></a>
                        @endif
                    </div>
                    <i class="text-muted" style="font:italic; font-size: 13px">Ultima modificacion
                        {{ \Carbon\Carbon::parse($cart->updated_at,'America/Mexico_City')->format('d/m/Y')}}
                        a las {{ \Carbon\Carbon::parse($cart->updated_at,'America/Mexico_City')->format('H:i:s')}} hrs</i>
                </form>
            </div>
        </section>
    @endsection
