@extends('layouts.app')

    @section('content')
        <div class="container">
        @if(Session::has('success'))
                <div class="alert alert-success" roler="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        @endif
            <form action="{{ url('/user/'.$user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
                @if(Auth::user()->rol_id==1)
                    <a class="btn btn-secondary btn-lg" href="{{ url('users/') }}">
                        <i class="fas fa-chevron-circle-left"></i></a>
                @else
                    <a class="btn btn-secondary btn-lg" href="{{ url('products/') }}">
                        <i class="fas fa-chevron-circle-left"></i></a>
                @endif
                <h1 class="text-break">{{$user->name}}</h1>
                @if(count($errors)>0)
                    <div class="alert alert-danger" roler="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li> {{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-sm-4">
                    @if(isset($user->image))
                        <div class="gallery-main">
                            <figure>
                                <img class="img-fluid" src="{{URL::asset('../storage/app/public/uploads/'.$user->image)}}" width="500" alt="{{$user->image}}">
                                <figcaption>{{$user->name}} <small>{{$user->image}}</small></figcaption>
                            </figure>
                        </div>
                    @endif
                    </div>
                    <div class="col">
                        <label for="email">Correo</label>
                        <br>
                        <div class="form-floating">
                            <p class="text-break">{{ $user->email}}</p>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="Direccion">Direccion</label>
                                <p class="text-break">{{$user->address}}</p>
                            </div>
                            <div class="col">
                                <label for="Telefono">Telefono</label>
                                <p class="text-break">{{$user->telephone}}</p>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="Rol">Rol de usuario</label>
                                <h5 class="text-break">{{$user->rol->name}}</h5>
                            </div>
                            <div class="col">
                                @if(($user->rol_id)=='2')
                                    <label for="Proveedor">Proveedor</label>
                                    <h5 class="text-break">{{$user->provider->name}}</h5>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="col-md-3 offset-md-8">
                    @if(isset(Auth::user()->id))
                        @if((Auth::user()->rol_id==1)||($user->id==Auth::user()->id))
                            <a href="{{ route('users.edit',$user->id) }}" class="btn btn-tertiary btn-lg">
                                <i class="fa fa-fw fa-edit"></i></a>
                        @endif
                    @endif
                </div>
                <i class="text-muted" style="font:italic; font-size: 13px">Ultima modificacion
                    {{ \Carbon\Carbon::parse($user->updated_at)->format('d/m/Y')}}
                    a las {{ \Carbon\Carbon::parse($user->updated_at)->format('H:i:s')}} hrs</i>
    
            </form>
        </div>
    @endsection
