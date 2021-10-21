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
    <h1>Iluminacion Interior</h1>
    @break

    @case(2)
    <h1>Iluminacion Exterior</h1>
    @break
    
    @case(3)
    <h1>Iluminacion Automotriz</h1>
    @break

    @case(4)
    <h1>Iluminacion Industrial</h1>
    @break
    
    @case(5)
    <h1>Repuestos y Accesorios</h1>
    @break
  @endswitch
 @else
 <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner shadow-lg">
        <div class="carousel-item active " data-bs-interval="5000">
          <img src="{{ url('../storage/app/public/wallpaper_1.jpg') }}" class="d-block w-100" alt="wallpaper 1">
        </div>
        <div class="carousel-item" data-bs-interval="10000">
          <img src="{{ url('../storage/app/public/wallpaper_2.jpg') }}" class="d-block w-100" alt="wallpaper 2">
        </div>
        <div class="carousel-item" data-bs-interval="15000">
          <img src="{{ url('../storage/app/public/wallpaper_3.jpg') }}" class="d-block w-100" alt="wallpaper 3">
        </div>
        <div class="carousel-item" data-bs-interval="20000">
          <img src="{{ url('../storage/app/public/wallpaper_4.jpg') }}" class="d-block w-100" alt="wallpaper 4">
        </div>
      </div>
      
      <button class="carousel-control-prev" style="background-color:transparent; border:none" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"  aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      
      <button class="carousel-control-next" style="background-color:transparent; border:none" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
      
    </div>
 @endif
<!--<a href="{{ route('products.create') }}" class="btn btn-tertiary"><i class="fas fa-box"></i> Nuevo Producto</a>-->
<br><br>
<div class="row row-cols-1 row-cols-md-4 g-4" >
  @foreach( $products as $product)
  <div class="col">
    <div class="card h-100 text-center shadow">
    <a href="{{ route('products.show',$product->id) }}" class="card-link">
        <img class="rounded mx-auto d-block" src="../storage/app/public/uploads/{{$product->image}}" width="60%" style="margin:5%" alt="Imagen no disponible">
            </a>
    
        <div class="card-body">
            <a href="{{ route('products.show',$product->id) }}" class="card-link">
            <h5 class="card-title">{{ $product->name}}</h5>
            <p class="card-text"> Stock @if (($product->stock)>0) Disponible @else No disponible @endif</p>
            <p class="card-text">{{ $product->category->name}}</p>
            <h6 class="card-subtitle mb-2 text-muted">${{ $product->price}} MXN</h6>
            </a>
        </div>
        <!--<div class="card-footer text-muted">
            <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-trash"></i></button>
            </form>
        </div>-->
    </div>
  </div>
  @endforeach
  @if(empty($products))
    Sin resultados
  @endif
{!! $products->links()!!}
@endsection







