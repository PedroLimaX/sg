@extends('layouts.app')
    @section('content')
        <section class="content container-fluid">
            <a class="btn btn-secondary" href="{{ url('users/') }}"><i class="fas fa-chevron-circle-left"></i></a>
                <div class="col-md-12">
                    @includeif('partials.errors')
                    <div class="card-default">
                        <h1>Crear Proveedor</h1>
                        <div class="card-body">
                            <form method="POST" action="{{ route('users.store') }}"  role="form" enctype="multipart/form-data">
                                @csrf
                                @include('user.form', ['modo'=>'Crear'])
                            </form>
                        </div>
                    </div>
                </div>
        </section>
    @endsection
