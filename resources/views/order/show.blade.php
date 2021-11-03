@extends('layouts.app')

@section('template_title')
    {{ $order->name ?? 'Show order' }}
@endsection

@section('content')
    <section class="content container-fluid">
    <a class="btn btn-secondary btn-lg" href="{{ url('order/') }}"><i class="fas fa-chevron-circle-left"></i></a>
    <div class="container">
<form action="{{ url('/order/'.$order->id) }}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}
    
<h1 class="text-break">{{ $order->name }}</h1>

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
        @if(isset($order->image))
            <img class="rounded" src="../storage/app/public/uploads/{{$order->image}}" width="350" alt="{{$order->image}}">
        @endif
    </div>
    <div class="col">
            <div class="form-floating">
            <p class="text-break">{{ $order->description}}</p>
            </div>
            <br>

            <label for="specs">Especificaciones</label>
            
            <br>

            <div class="form-floating">
            <p class="text-brek">{{ $order->specs}}</p>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <label for="Stock">Stock</label>
                    <h5 class="text-break">@if (($order->stock)>0) Disponible @else No disponible @endif</h5>
                </div>

                <div class="col">
                    <label for="price">Precio</label>
                    <h1 class="text-break">${{ $order->price }} MXN</h1>
                </div>
            </div>
            <br>
            <label for="materials">Materiales</label>
            <p class="text-break">{{ $order->materials }}</p>
            <br>
            <div class="row">
                <div class="col">
                    <label for="provider">Proveedor</label>
                    <p class="text-break">{{ $order->provider->name }}</p>
                </div>
                <div class="col">
                    <label for="category">Categoria</label>
                    <p class="text-break">{{ $order->category->name }}</p>
                </div>
            </div>
    </div>
</div>

<br>

<div class="col-md-3 offset-md-10">
<a href="{{ route('order.edit',$order->id) }}" class="btn btn-tertiary btn-lg"><i class="fa fa-fw fa-edit"></i></a>
    <a class="btn btn-primary btn-lg" href="#"><i class="fas fa-cart-plus"></i></a>
    
</div>
<i class="text-muted" style="font:italic; font-size: 13px">Ultima modificacion
    {{ \Carbon\Carbon::parse($order->updated_at)->format('d/m/Y')}}
    a las {{ \Carbon\Carbon::parse($order->updated_at)->format('H:i:s')}} hrs</i>
   
</form>
</div>
    </section>
@endsection
