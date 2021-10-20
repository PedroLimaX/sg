@extends('layouts.app')
@section('content')
    <section class="content container-fluid">
    <a class="btn btn-secondary btn-lg" href="{{ route('providers.index') }}"><i class="fas fa-chevron-circle-left"></i></i></a>
    <div class="container">
<form action="{{ url('/provider/'.$provider->id) }}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}
    
<h1 class="text-break">{{ $provider->name }}</h1>

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
        @if(isset($provider->image))
        <br><br>
            <img class="rounded" src="{{URL::asset('../storage/app/public/uploads/'.$provider->image)}}" width="350" alt="">
        @endif
        
    </div>
    <div class="col">
            <div class="form-floating">
            <b><p class="text-break">{{ $provider->description}}</p></b>
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

<div class="col-md-5 offset-md-8">
    
<a href="{{ route('providers.edit',$provider->id) }}" class="btn btn-tertiary btn-lg"><i class="fa fa-fw fa-edit"></i></a>
    <a class="btn btn-primary btn-lg" href="#"><i class="fas fa-table"></i></a>
    
</div>

<i class="text-muted" style="font:italic; font-size: 13px">Ultima modificacion
    {{ \Carbon\Carbon::parse($provider->updated_at)->format('d/m/Y')}}
    a las {{ \Carbon\Carbon::parse($provider->updated_at)->format('H:i:s')}} hrs</i>
   
</form>
</div>

    </section>
@endsection
