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
                            <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
                            <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
                            <figure>
                                <img class="img-fluid" src="{{URL::asset('../storage/app/public/uploads/'.$user->image)}}" width="500" alt="{{$user->image}}">
                                <figcaption>{{$user->name}} <small>{{$user->image}}</small></figcaption>
                            </figure>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="display:none;">
                            <symbol id="close" viewBox="0 0 18 18">
                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M9,0.493C4.302,0.493,0.493,4.302,0.493,9S4.302,17.507,9,17.507
                                        S17.507,13.698,17.507,9S13.698,0.493,9,0.493z M12.491,11.491c0.292,0.296,0.292,0.773,0,1.068c-0.293,0.295-0.767,0.295-1.059,0
                                        l-2.435-2.457L6.564,12.56c-0.292,0.295-0.766,0.295-1.058,0c-0.292-0.295-0.292-0.772,0-1.068L7.94,9.035L5.435,6.507
                                        c-0.292-0.295-0.292-0.773,0-1.068c0.293-0.295,0.766-0.295,1.059,0l2.504,2.528l2.505-2.528c0.292-0.295,0.767-0.295,1.059,0
                                        s0.292,0.773,0,1.068l-2.505,2.528L12.491,11.491z"/>
                            </symbol>
                        </svg>
                        <script src="{{asset('js/gallery.js')}}"></script>
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
