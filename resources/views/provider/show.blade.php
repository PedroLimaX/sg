@extends('layouts.app')
    @section('content')
        <section class="content container-fluid">
            <a class="btn btn-secondary btn-lg" href="{{ route('providers.index') }}">
                <i class="fas fa-chevron-circle-left"></i></a>
            <div class="container">
                <form action="{{ url('/provider/'.$provider->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PATCH') }}
                    <h1 class="text-break text-center">{{ $provider->name }}</h1>
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
                        <div class="col-sm-5">
                            @if(isset($provider->image))
                                <div class="gallery-main">
                                    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
                                    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
                                    <figure>
                                        <img class="img-fluid" src="{{URL::asset('../storage/app/public/uploads/providers/'.$provider->image)}}" width="500" alt="{{$provider->image}}">
                                        <figcaption>{{$provider->name}} <small>{{$provider->image}}</small></figcaption>
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
                            <br><br>
                            <div class="form-floating">
                                <p class="text-break">{{ $provider->description}}</p>
                            </div>
                            <br>
                            <label for="location">Ubicacion</label>
                            <br>
                            <div class="form-floating">
                                <p class="text-break">{{ $provider->location}}</p>
                            </div>
                            <br>
                            <h5 for="email">Contactos</h5>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <label for="email">Correo</label>
                                    <p class="text-break">{{ $provider->email }}</p>
                                </div>  
                                <div class="col">
                                    <label for="telephone">Telefono</label>
                                    <p class="text-break">{{ $provider->telephone }}</p>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                    <br>
                    <div class="col-md-5 offset-md-7">
                        @if(Auth::check())
                            @if((Auth::user()->rol_id==1)||($provider->id==Auth::user()->provider_id))
                                <a href="{{ route('providers.edit',$provider->id) }}" class="btn btn-tertiary btn-lg">
                                    <i class="fa fa-fw fa-edit"></i></a>
                            @endif
                            @if($provider->id==Auth::user()->provider_id)
                                <a class="btn btn-primary btn-lg" href="{{url('product/import-form')}}">
                                    <i class="fas fa-table"></i> <small> Actualizar inventario<small></a>

                                <a class="btn btn-primary btn-lg" href="{{route('downloadPDF')}}">
                                    <i class="fas fa-file-pdf"></i> <small> Reporte de ventas<small></a>
                            @endif
                            @if(Auth::user()->roll_id==1)
                                <a class="btn btn-primary btn-lg" href="{{route('downloadPDF')}}">
                                    <i class="fas fa-file-pdf"></i> <small> Reporte de ventas<small></a>
                            @endif
                        @endif
                    </div>
                    <i class="text-muted" style="font:italic; font-size: 13px">Ultima modificacion
                        {{ \Carbon\Carbon::parse($provider->updated_at,'America/Mexico_City')->format('d/m/Y')}}
                        a las {{ \Carbon\Carbon::parse($provider->updated_at,'America/Mexico_City')->format('H:i:s')}} hrs</i>
                </form>
            </div>
        </section>
    @endsection
