@extends('layouts.app')
    @section('content')
        <section class="content container-fluid">
            <a class="btn btn-secondary btn-lg" href="{{ url('imageproducts/') }}">
                <i class="fas fa-chevron-circle-left"></i></a>
            <div class="col-md-12">
                @includeif('partials.errors')
                <div class="card-default">
                    <h1>Agregar Imagen</h1>
                    <div class="card-body">
                        <form method="POST" action="{{ route('imageproducts.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            @include('imageproduct.form', ['modo'=>'Crear'])
                        </form>
                    </div>
                </div>
            </div>
        </section>
    @endsection
