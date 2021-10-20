@extends('layouts.app')

@section('template_title')
    {{ $product->name ?? 'Show product' }}
@endsection

@section('content')
    <section class="content container-fluid">
    <a class="btn btn-secondary btn-lg" href="{{ url('products/') }}"><i class="fas fa-chevron-circle-left"></i></a>
    <div class="container">
<form action="{{ url('/product/'.$product->id) }}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}
    
<h1 class="text-break">{{ $product->name }}</h1>

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
        <br><br>
            <img class="rounded" src="{{URL::asset('../storage/app/public/uploads/'.$product->image)}}" width="350" alt="{{$product->image}}">
    </div>
    <div class="col">
            <div class="form-floating">
            <b><p class="text-break">{{ $product->description}}</p></b>
            </div>
            <br>

            <label for="specs">Especificaciones</label>
            
            <br>

            <div class="form-floating">
            <p class="text-brek">{{ $product->specs}}</p>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <label for="Stock">Stock</label>
                    <h5 class="text-break">@if (($product->stock)>0) Disponible @else No disponible @endif</h5>
                </div>

                <div class="col">
                    <label for="price">Precio</label>
                    <h1 class="text-break">${{ $product->price }} MXN</h1>
                
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <label for="materials">Materiales</label>        
                    <p class="text-break">{{ $product->materials }}</p>
                </div>
                <div class="col">
                    <label for="category">Fabricante</label>
                    <p class="text-break">{{ $product->maker }}</p>
                </div>
            </div>
            
            
            <br>
            <div class="row">
                <div class="col">
                    <label for="provider">Proveedor</label>
                    <p class="text-break">{{ $product->provider->name }}</p>
                </div>
                <div class="col">
                    <label for="category">Categoria</label>
                    <p class="text-break">{{ $product->category->name }}</p>
                </div>
            </div>
    </div>
</div>

<br>

<div class="col-md-3 offset-md-9">

<div class="input-group mb-1">
    <span class="form-control" for="inputGroupFile01">Cantidad</span>
    <input class="form-control" type="number" id="quant_product" name="quant_product" value="1"
       min="1" max="{{$product->max_per_order}}">
       <a class="form-control btn btn-primary" href="{{url('carts/')}}" title="Añadir al carrito"><i class="fas fa-cart-plus"></i></a>
    </div>
</div>
<i class="text-muted" style="font:italic; font-size: 13px">Ultima modificacion
    {{ \Carbon\Carbon::parse($product->updated_at)->format('d/m/Y')}}
    a las {{ \Carbon\Carbon::parse($product->updated_at)->format('H:i:s')}} hrs</i>
   
</form>
</div>
    </section>
@endsection
