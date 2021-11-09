@extends('layouts.app')
    @section('content')
        <section class="content container-fluid">
            <div class="alert alert-info alert-dismissible d-flex align-items-center fade show shadow" roler="alert">
            <i class="fas fa-info-circle"></i>
                <strong class="mx-2">Importante!</strong>Se recomienda utilizar imagenes en HD, 2K o 4K
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-left:10px">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <a class="btn btn-secondary btn-lg" href="{{ url('tips/') }}">
                <i class="fas fa-chevron-circle-left"></i></a>
            <div class="col-md-12">
                @includeif('partials.errors')
                <div class="card-default">
                    
                    <h1>Crear tip</h1>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tips.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            @include('tip.form')
                        </form>
                    </div>
                </div>
            </div>
        </section>
    @endsection
