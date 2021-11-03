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
<a class="btn btn-secondary btn-lg" href="{{ url('products/') }}">
  <i class="fas fa-chevron-circle-left"></i></a>
  <br><br>
<a href="{{ route('sliders.create') }}" class="btn btn-tertiary">
    <i class="fas fa-images"></i> Nuevo Slider</a>
<div class="md-1">
  <div class="list-group">
    @foreach( $sliders as $slider)
      <a href="{{ route('sliders.show',$slider->id) }}" class="list-group-item list-group-item-action flex-column align-items-start" style="margin-top:20px">
        <div class="row d-flex w-100 justify-content-between">
          <div class="col-sm-6">
            <img class="mb-1 rounded shadow img-fluid" src="{{URL::asset('../storage/app/public/uploads/'.$slider->image)}}" alt="{{ $slider->image}}">
          </div>
          <div class="col">
            <b><h1 class="mb-1"> {{$slider->title}}</h1></b>
          </div>
          <form action="{{ route('sliders.destroy',$slider->id) }}" method="POST">
            @csrf
            @method('DELETE')
              <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-trash"></i></button>
            </form>
        </div>
        <hr class="my-4">
        <small><i class="text-muted" style="font:italic; font-size: 13px">Ultima modificacion
          {{ \Carbon\Carbon::parse($slider->updated_at)->format('d/m/Y')}}
          a las {{ \Carbon\Carbon::parse($slider->updated_at)->format('H:i:s')}} hrs</i></small>
      </a>
    @endforeach
  </div>
</div>
{!! $sliders->links()!!}
@endsection