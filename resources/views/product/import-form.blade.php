@extends('layouts.app')
    @section('content')
        <section class="content container-fluid">
        <div class="alert alert-info alert-dismissible d-flex align-items-center fade show" roler="alert">
            <i class="fas fa-info-circle"></i>
                <strong class="mx-2">Importante!</strong>El archivo csv debe tener las siguientes columnas en el mismo orden:<br>
                sku | name | key_words | description | specs | normal_price | discount | available | max_per_order | materials | maker | category_id
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-left:10px">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <h1>Actualizar Inventario de {{Auth::user()->provider->name}}</h1>
            <div class="col-md-6 offset-md-3">
                @includeif('partials.errors')
                <div class="card text-center">
                    <div class="card-body">
                        <h1>Importar CSV</h1>
                        <form method="POST" action="{{route('product.import')}}"  enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                              <input type="file" name="csv-file" id="" class="form-control" placeholder="" aria-describedby="helpId">
                              <br>
                              <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    @endsection
