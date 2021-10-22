@extends('layouts.app')
    @section('template_title')
        provider
    @endsection
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

            <h1>{{ __('Nuestros Proveedores') }}</h1>

            @if(Auth::check())
                @if(Auth::user()->rol_id==1)
                    <a href="{{ route('providers.create') }}" class="btn btn-tertiary">
                        <i class="fas fa-user-plus"></i> Nuevo Proveedor</a>
                    <br><br>
                @endif
            @endif
            <div class="row row-cols-1 row-cols-md-4 g-4" >
                @foreach( $providers as $provider)
                    <div class="col">
                        <div class="card h-100 text-center">
                            <a href="{{ route('providers.show',$provider->id) }}" class="card-link">
                                <img class="rounded mx-auto d-block" src="../storage/app/public/uploads/{{$provider->image}}" width="60%" style="margin:5%" alt="Imagen no disponible">
                            </a>
                            <div class="card-body">
                                <a href="{{ route('providers.show',$provider->id) }}" class="card-link">
                                <h5 class="card-title">{{ $provider->name}}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Contactos</h6>
                                <p class="card-text">{{ $provider->telephone}}</p>
                                <p class="card-text">{{ $provider->email}}</p>
                                </a>
                            </div>
                            @if(Auth::check())
                                @if(Auth::user()->rol_id==1)
                                    <div class="card-footer text-muted">
                                        <form action="{{ route('providers.destroy',$provider->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-trash"></i></button>
                                        </form>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                @endforeach
                {!! $providers->links()!!}
            </div>
        </div>
    @endsection







