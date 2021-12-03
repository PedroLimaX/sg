@extends('layouts.app')
    @section('content')
        <section class="content container-fluid">
        <a class="btn btn-secondary btn-lg" href="{{ url('carts/') }}"><i class="fas fa-chevron-circle-left"></i></a>
                <div class="col-md-12">
                    @includeif('partials.errors')
                    <div class="card-default">
                        <h1>Crear Pedido</h1>
                        <div class="card-body">
                            <form method="POST" action="{{ route('carts.store') }}"  role="form" enctype="multipart/form-data">
                                @csrf
                                @include('cart.form', ['modo'=>'Crear'])
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
