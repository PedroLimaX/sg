@extends('layouts.app')

@section('template_title')
    Update ordero
@endsection

@section('content')
    <section class="content container-fluid">
        
    <a class="btn btn-secondary btn-lg" href="{{ url('orders/'.$order->id) }}"><i class="fas fa-chevron-circle-left"></i></a>
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card-default">
                        <h1>Editar Pedido</h1>
                    <div class="card-body">
                        <form method="POST" action="{{ route('orders.update', $order->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            @include('order.form', ['modo'=>'Editar']);
                        </form>
                    </div>
                </div>
            </div>
    </section>
@endsection
