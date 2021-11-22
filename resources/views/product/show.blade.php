@extends('layouts.app') 

@section('content')
    <section class="content container-fluid">
    <a class="btn btn-secondary btn-lg" href="{{ url('products/') }}"><i class="fas fa-chevron-circle-left"></i></a>
    <div class="container">
    @csrf
    {{ method_field('PATCH') }}
    @if(($product->discount)>0)
        <h4 class=""><span class="badge badge-pill badge-danger">-{{$product->discount}}%</span></h4>
    @endif
    <h1 class="text-break">{{ $product->name }}</h1><h4 class="text-break stock-available">@if ($product->available) Disponible @endif</h4>
                <h4 class="text-break stock-not-available">@if (!$product->available) Agotado @endif</h4>

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
        <div class="gallery-main">
            <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
            <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
            <figure>
                <img class="img-fluid" src="{{URL::asset('../storage/app/public/uploads/imageproducts/'.$product->image)}}" width="500" alt="{{$product->image}}">
                <figcaption> <small>{{$product->name}}</small></figcaption>
            </figure>
        </div>
        <div class="gallery">
            <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
            <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
            @foreach ($imageproducts as $imageproduct)
                <figure>
                    <img class="img-fluid" src="{{URL::asset('../storage/app/public/uploads/imageproducts/'.$imageproduct->image)}}" width="500" alt="{{$imageproduct->image}}">
                    <figcaption><small>{{$product->name}}</small></figcaption>
                </figure>
            @endforeach
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="display:none;">
            <symbol id="close" viewBox="0 0 18 18">
                <path fill-rule="evenodd" clip-rule="evenodd" fill="#000" d="M9,0.493C4.302,0.493,0.493,4.302,0.493,9S4.302,17.507,9,17.507
                        S17.507,13.698,17.507,9S13.698,0.493,9,0.493z M12.491,11.491c0.292,0.296,0.292,0.773,0,1.068c-0.293,0.295-0.767,0.295-1.059,0
                        l-2.435-2.457L6.564,12.56c-0.292,0.295-0.766,0.295-1.058,0c-0.292-0.295-0.292-0.772,0-1.068L7.94,9.035L5.435,6.507
                        c-0.292-0.295-0.292-0.773,0-1.068c0.293-0.295,0.766-0.295,1.059,0l2.504,2.528l2.505-2.528c0.292-0.295,0.767-0.295,1.059,0
                        s0.292,0.773,0,1.068l-2.505,2.528L12.491,11.491z"/>
            </symbol>
        </svg>
        <script src="{{asset('js/gallery.js')}}"></script>
            @if(Auth::check())
                @if(Auth::user()->provider_id==$product->provider_id)
                    <a href="{{ route('imageproducts.index') }}" class="btn btn-tertiary">
                    <i class="fas fa-images"></i> Editar galeria</a>
                    <br><br>
                @endif
            @endif
        </div>
        <div class="col">
                <div class="form-floating">
                    <h6 class="text-break">SKU: {{ $product->sku}}</h6>
                </div>
                <br>
                <div class="form-floating">
                    <b><h4 class="text-break">{{ $product->description}}</h4></b>
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
                        <label for="price">Precio</label>
                        @if(($product->discount)>0)
                            <p class="text-break" style="text-decoration: line-through">${{ $product->normal_price }} MXN</p>
                            <h3 class="text-break">${{ $product->final_price }} MXN</h3>
                        @else
                            <h3 class="text-break">${{ $product->normal_price }} MXN</h3>
                        @endif
                    </div>
                    <div class="col">
                        
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
    <form action="{{ url('product/'.$product->id.'/addtocart')}}" method="POST">
        <div class="col-md-3 offset-md-9">
            <div class="input-group mb-3">
                @csrf
                <span class="form-control" for="inputGroupFile01">Cantidad</span>
                <input class="form-control" type="number" id="quant_product" name="quant_product"
                    value="1" min="1" max="{{$product->max_per_order}}">
                <button type="submit" class="form-control btn btn-primary"><i class="fa fa-cart-plus"></i></button>
            </div>
        </div>
    </form>
    
    @if(Auth::check())
        @if((Auth::user()->rol_id==1)||(Auth::user()->rol_id==2))
        <i class="text-muted" style="font:italic; font-size: 13px">Ultima modificacion
            {{ \Carbon\Carbon::parse($product->updated_at,'America/Mexico_City')->format('d/m/Y')}}
            a las {{ \Carbon\Carbon::parse($product->updated_at,'America/Mexico_City')->format('H:i:s')}} hrs</i>
        @endif
    @endif
</div>
    </section>
@endsection
