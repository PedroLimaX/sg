@extends('layouts.app')
    @section('content')
        <section class="content container-fluid">
            <div class="alert alert-info alert-dismissible d-flex align-items-center fade show shadow" roler="alert">
            <i class="fas fa-info-circle"></i>
                <strong class="mx-2">Importante!</strong>El tamaño recomendado para un slider es de 21:9 (Ultra wide) ej. 2560 x 1080 o 3440x1440 pixeles
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-left:10px">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <a class="btn btn-secondary btn-lg" href="{{ url('sliders/') }}">
                <i class="fas fa-chevron-circle-left"></i></a>
            <div class="col-md-12">
                @includeif('partials.errors')
                <div class="card-default">
                    
                    <h1>Crear Slider</h1>
                    <div class="card-body">
                        <form method="POST" action="{{ route('sliders.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            @include('slider.form')
                        </form>
                    </div>
                </div>
            </div>
        </section>
    @endsection
