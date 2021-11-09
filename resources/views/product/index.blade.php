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
      <br>
      @if(isset($category))
        @switch($category)
          @case(1)
          <h5>Iluminacion Interior</h5>
          @break

          @case(2)
          <h5>Iluminacion Exterior</h5>
          @break
          
          @case(3)
          <h5>Iluminacion Automotriz</h5>
          @break

          @case(4)
          <h5>Iluminacion Industrial</h5>
          @break
          
          @case(5)
          <h5>Repuestos y Accesorios</h5>
          @break
        @endswitch
      @elseif(isset($filter))
        <h5> Resultados para "{{$filter}}"</h5>
        <br><br>
      @endif
      <!--<a href="{{ route('products.create') }}" class="btn btn-tertiary"><i class="fas fa-box"></i> Nuevo Producto</a>-->
      <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach( $products as $product)
          <div class="col" style="margin-top:20px">
            <div class="card h-100 text-center">
              <a href="{{ route('products.show',$product->id) }}" class="card-link">
              @if(($product->discount)>0)
                <h4 class="text-right"><span class="badge badge-pill badge-danger">-{{$product->discount}}%</span></h4>
              @endif
              
                  <img class="img-fluid mx-auto rounded shadow" src="{{URL::asset('../storage/app/public/uploads/'.$product->image)}}" width="80%" alt="{{$product->image}}">
                
              </a>
              <div class="card-body">
                <a href="{{ route('products.show',$product->id) }}" class="card-link">
                  <h5 class="card-title">{{ $product->name}}</h5>
                  <p class="card-text"> Stock @if (($product->stock)>0) Disponible @else Agotado @endif</p>
                  <p class="card-text">{{ $product->maker}}</p>
                  @if(($product->discount)>0)
                    <span class="card-subtitle mb-2 text-muted" style="text-decoration: line-through">${{ $product->normal_price}} MXN</span> | <span class="text-break">${{ $product->final_price }} MXN</span>
                  @else
                  <span class="card-subtitle mb-2 text-muted">${{ $product->normal_price}} MXN</span>
                  @endif
                </a>
              </div>
              <!--
              <div class="card-footer text-muted">
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-trash"></i></button>
                </form>
              </div>
              --->
            </div>
          </div>
        @endforeach
      </div>
      <div class="d-flex justify-content-center" style="margin-top:20px">
        {!! $products->links() !!}
      </div>
    </div>
    
  @endsection