@extends('layouts.app')

@section('template_title')
    Update carto
@endsection

@section('content')
    <section class="content container-fluid">
        
    <a class="btn btn-secondary btn-lg" href="{{ url('carts/'.$cart->id) }}"><i class="fas fa-chevron-circle-left"></i></a>
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card-default">
                        <h1>Editar carto</h1>
                    <div class="card-body">
                        <form method="POST" action="{{ route('carts.update', $cart->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            @include('cart.form', ['modo'=>'Editar']);
                        </form>
                    </div>
                </div>
            </div>
    </section>
@endsection
