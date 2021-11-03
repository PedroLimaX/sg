@extends('layouts.app')
  @section('content') 
    <div class="container">
      @if(Session::has('mensaje'))
        <div class="alert alert-success" roler="alert">
          {{ Session::get('mensaje') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
      <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach( $products as $product)
          <div class="col" style="margin-top:20px">
            <div class="card h-100 text-center">
              <a href="{{ route('products.show',$product->id) }}" class="card-link">
                <h4 class="text-right"><span class="badge badge-pill badge-success">-{{$product->discount}}%</span></h4>
                <img class="rounded mx-auto d-block" src="../storage/app/public/uploads/{{$product->image}}" width="60%" style="margin:5%" alt="Imagen no disponible">
              </a>
              <div class="card-body">
                <a href="{{ route('products.show',$product->id) }}" class="card-link">
                  <h5 class="card-title">{{ $product->name}}</h5>
                  <p class="card-text"> Stock @if (($product->stock)>0) Disponible @else Agotado @endif</p>
                  <p class="card-text">{{ $product->maker}}</p>
                    <span class="card-subtitle mb-2 text-muted" style="text-decoration: line-through">${{ $product->normal_price}} MXN</span> | <span class="text-break">${{ $product->final_price }} MXN</span>
                </a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      <div class="d-flex justify-content-center" style="margin-top:20px">
        {!! $products->links() !!}
      </div>
    </div>
  @endsection