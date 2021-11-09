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
<a class="btn btn-secondary btn-lg" href="{{ url('/home') }}">
  <i class="fas fa-chevron-circle-left"></i></a>
  <br><br>
<a href="{{ route('tips.create') }}" class="btn btn-tertiary">
    <i class="fas fa-images"></i> Nuevo tip</a>
<div class="md-2">
  <div class="row row-cols-1 row-cols-md-2 g-2">
    @foreach( $tips as $tip)
    <div class="col" style="margin-top:20px">
      <div class="card text-white shadow">
        <img src="{{URL::asset('../storage/app/public/uploads/'.$tip->image)}}" class="card-img" alt="...">
        <div class="card-img-overlay mx-auto">
          <div class="carousel-caption d-none d-md-block" style="padding:10px">
            <p class="card-text text-white"> {{$tip->title}}</p>
            <small class="card-text text-muted">Ultima modificacion
            {{ \Carbon\Carbon::parse($tip->updated_at,'America/Mexico_City')->format('d/m/Y')}}
            a las {{ \Carbon\Carbon::parse($tip->updated_at,'America/Mexico_City')->format('H:i:s')}} hrs</small>
              <form action="{{ route('tips.destroy',$tip->id) }}" method="POST">
              @csrf
              @method('DELETE')
                <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-trash"></i></button>
                <a href="{{ route('tips.edit',$tip->id) }}" class="btn btn-primary">
                  <i class="fa fa-fw fa-edit"></i></a>
              </form>
          </div>
          
        </div>
      </div>
      </div>
    @endforeach
  </div>
</div>
{!! $tips->links()!!}
@endsection