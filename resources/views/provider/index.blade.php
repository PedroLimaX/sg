@extends('layouts.app')
    @section('template_title')
        provider
    @endsection
    @section('content')
        <div class="container">
            <h1>{{ __('Nuestros Proveedores') }}</h1>

            @if(Session::has('success'))
                <div class="alert alert-success fade show d-inline-flex" roler="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-left:10px">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

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
                                <p class="card-text mb-1 text-muted">Contactos</p>
                                <span class="card-text"><small><i class="fas fa-phone text-muted"></i></small> {{ $provider->telephone}}</span>
                                <br>
                                <span class="card-text"><small><i class="fas fa-at text-muted"></i></small> {{ $provider->email}}</span>
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







