@extends('layouts.app')

    @section('content')
        <section class="content container-fluid">
            <a class="btn btn-secondary btn-lg" href="{{ url('products/'.$product->id) }}">
                <i class="fas fa-chevron-circle-left"></i></a>
            <div class="col-md-12">
                @includeif('partials.errors')
                <div class="card-default">
                    <h1>Editar Producto</h1>
                    <div class="card-body">
                        <form method="POST" action="{{ route('products.update', $product->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            @include('product.form', ['modo'=>'Editar']);
                        </form>
                    </div>
                </div>
            </div>
        </section>
    @endsection
