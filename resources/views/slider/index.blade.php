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
<a class="btn btn-secondary btn-lg" href="{{ url('products/') }}">
  <i class="fas fa-chevron-circle-left"></i></a>
  <br><br>
<a href="{{ route('sliders.create') }}" class="btn btn-tertiary">
    <i class="fas fa-images"></i> Nuevo Slider</a>
<div class="md-2">
  <div class="row row-cols-1 row-cols-md-2 g-2">
    @foreach( $sliders as $slider)
    <div class="col" style="margin-top:20px">
      <div class="card text-white shadow">
        <img src="{{URL::asset('../storage/app/public/uploads/'.$slider->image)}}" class="card-img" alt="...">
        <div class="card-img-overlay mx-auto">
          <div class="carousel-caption d-none d-md-block" style="padding:10px">
            <p class="card-text text-white"> {{$slider->title}}</p>
            <small class="card-text text-muted">Ultima modificacion
            {{ \Carbon\Carbon::parse($slider->updated_at)->format('d/m/Y')}}
            a las {{ \Carbon\Carbon::parse($slider->updated_at)->format('H:i:s')}} hrs</small>
              <form action="{{ route('sliders.destroy',$slider->id) }}" method="POST">
              @csrf
              @method('DELETE')
                <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-trash"></i></button>
                <a href="{{ route('sliders.edit',$slider->id) }}" class="btn btn-primary">
                  <i class="fa fa-fw fa-edit"></i></a>
              </form>
          </div>
          
        </div>
      </div>
      </div>
    @endforeach
  </div>
</div>
{!! $sliders->links()!!}
@endsection