@extends('layouts.app')

    @section('content')
        <section class="content container-fluid">
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
