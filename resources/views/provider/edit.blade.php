@extends('layouts.app')
    @section('content')
        <section class="content container-fluid">
            <div class="row justify-content-start">
                <div class="col-1">
                <a class="btn btn-secondary btn-lg" href="{{ url('providers/'.$provider->id.'/') }}">
                <i class="fas fa-chevron-circle-left"></i></a>
                </div>
                <div class="col">
            <h1>Editar Proveedor</h1>
                </div>
            </div>
            <div class="container">
                @includeif('partials.errors')
                <div class="card-default">
                    <div class="card-body">
                        <form method="POST" action="{{ route('providers.update', $provider->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}    
                            @csrf
                            @include('provider.form', ['modo'=>'Crear'])
                        </form>
                    </div>
                </div>
            </div>
        </section>
    @endsection