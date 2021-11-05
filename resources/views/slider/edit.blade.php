@extends('layouts.app')
    @section('content')
        <section class="content container-fluid">
            <a class="btn btn-secondary" href="{{ url('sliders/') }}">
                <i class="fas fa-chevron-circle-left"></i></a>
            <div class="col-md-12">
                @includeif('partials.errors')
                <div class="card-default">
                    <h1>Editar Slider</h1>
                    <div class="card-body">
                        <form method="POST" action="{{ route('sliders.update', $slider->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}    
                            @csrf
                            @include('slider.form')
                        </form>
                    </div>
                </div>
            </div>
        </section>
    @endsection