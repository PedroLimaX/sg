@extends('layouts.app')
    @section('content')
        <section class="content container-fluid">
            <a class="btn btn-secondary btn-lg" href="{{ url('users/'.$user->id.'/') }}"><i class="fas fa-chevron-circle-left"></i></a>
                <div class="col-md-12">
                    @includeif('partials.errors')
                    <div class="card-default">
                        <h1>Editar Usuario</h1>
                        <div class="card-body">
                            <form method="POST" action="{{ route('users.update', $user->id) }}"  role="form" enctype="multipart/form-data">
                                {{ method_field('PATCH') }}
                                @csrf
                                @include('user.form', ['modo'=>'Editar'])
                            </form>
                        </div>
                    </div>
                </div>
        </section>
    @endsection