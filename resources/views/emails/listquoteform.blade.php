@extends('layouts.app')
    @section('content')
        <section class="content container">
            <a class="btn btn-secondary btn-lg" href="{{ url('/') }}">
                <i class="fas fa-chevron-circle-left"></i></a>
            <div class="col-md-12">
                @includeif('partials.errors')
                <div class="card-default">
                    <div class="card-body">
                        <h1>Solicitar Cotización</h1>
                        <br>
                        <form method="POST" action="{{ route('listquote.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    <div class="form-group">
                                        {{ Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder'=> 'Su Nombre']) }}
                                        {!! $errors->first('name', '<p class="invalid-feedback">:message</p>') !!}
                                        <br><br>

                                        {{ Form::text('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder'=> 'Su Correo']) }}
                                        {!! $errors->first('email', '<p class="invalid-feedback">:message</p>') !!}
                                        <br><br>

                                        {{ Form::textarea('details', null, ['class' => 'form-control' . ($errors->has('details') ? ' is-invalid' : ''), 'placeholder'=> 'Detalles']) }}
                                        {!! $errors->first('details', '<p class="invalid-feedback">:message</p>') !!}
                                        <br>
                                    </div>
                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    @endsection
