@extends('layouts.app')
    @section('content')
        <section class="content container-fluid">
            <a class="btn btn-secondary" href="{{ url('providers/'.$provider->id.'/') }}">
                <i class="fas fa-chevron-circle-left"></i></a>
            <div class="col-md-12">
                @includeif('partials.errors')
                <div class="card-default">
                    <h1>Editar Proveedor</h1>
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