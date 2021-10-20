@extends('layouts.app')

@section('template_title')
    {{ $rol->name ?? 'Mostrar Rol' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Rol</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('rols.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Tipo:</strong>
                            {{ $rol->name }}
                            <br>
                            <br>
                            <h5>Permisos disponibles</h5>
                            
                            <strong>Crear:</strong>
                            @if($rol->create_permission)
                                <i class="fas fa-check-circle"></i>
                            @else
                                <i class="fas fa-times-circle"></i>
                            @endif
                            <br>
                            <strong>Editar:</strong>
                            @if($rol->update_permission)
                                <i class="fas fa-check-circle"></i>
                            @else
                                <i class="fas fa-times-circle"></i>
                            @endif
                            <br>
                            <strong>Leer:</strong>
                            @if($rol->read_permission)
                                <i class="fas fa-check-circle"></i>
                            @else
                                <i class="fas fa-times-circle"></i>
                            @endif
                            <br>
                            <strong>Borrar:</strong>
                            @if($rol->delete_permission)
                                <i class="fas fa-check-circle"></i>
                            @else
                                <i class="fas fa-times-circle"></i>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
