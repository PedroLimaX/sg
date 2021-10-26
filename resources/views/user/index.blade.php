@extends('layouts.app')
    @section('content')
        <div class="container">
            @if(Session::has('mensaje'))
                <div class="alert alert-success" roler="alert">
                    {{ Session::get('mensaje') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <!--<a href="{{ url('user/create') }}" class="btn btn-tertiary">
            <i class="fas fa-user-plus"></i> Nuevo usuario</a>-->
            <br><br>
            <table class="table table-borderless table-hover">
                <thead class="">
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>Telefono</th>
                        <th>Foto</th>
                        <th>Acciones</th>
                </thead>
                <tbody>
                @foreach( $users as $user)
                    <tr>
                        <td> {{ $user->name}} </td>
                        <td> {{ $user->email}} </td>
                        <td> {{ $user->rol->name}} </td>
                        <td> {{ $user->telephone}} </td>
                        <td> 
                            <img class="rounded" src="{{URL::asset('../storage/app/public/uploads/'.$user->image)}}" width="40" alt="">
                        </td>
                        <td> 
                            <a href="{{ route('users.show',$user->id) }}" class="btn btn-secondary">
                                <i class="fas fa-eye"></i></a>
                            <form action=" {{ url('/user/'.$user->id) }} " method="post" class="d-inline">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button type="submit" onclick="return confirm('¿Quieres borrar?')" class="btn btn-primary">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach    
                </tbody>
            </table>
            {!! $users->links()!!}
        </div>
    @endsection