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
      @if(Auth::check())
        @if(Auth::user()->id==1)
            <a href="{{ route('sliders.index') }}" class="btn btn-tertiary"><i class="fa fa-fw fa-edit"></i>Editar sliders</a>
            <a href="{{ route('tips.index') }}" class="btn btn-tertiary"><i class="fas fa-images"></i> Editar tips</a>
            @endif
    @endif
      <br>
      
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner shadow">
              <div class="carousel-item active " data-bs-interval="5000">
                <img src="{{ url('../storage/app/public/main_slider.jpg') }}" class="d-block w-100" alt="wallpaper 1">
                <div class="carousel-caption d-none d-md-block">
                  <p class="text-white">Slogan de SG Iluminacion</p>
                </div>
              </div>
              @foreach($sliders as $slider)
              <div class="carousel-item" data-bs-interval="5000">
                <img src="{{ url('../storage/app/public/uploads/'.$slider->image) }}" class="d-block w-100" alt="wallpaper 2">
                <div class="carousel-caption d-none d-md-block">
                  <p class="text-white">{{$slider->title}}</p>
                </div>
              </div>
              @endforeach
            </div>
            
            <button class="carousel-control-prev" style="background-color:transparent; border:none" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
              <span class="carousel-control-prev-icon"  aria-hidden="true"></span>
              <span class="visually-hidden"></span>
            </button>
            
            <button class="carousel-control-next" style="background-color:transparent; border:none" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden"></span>
            </button>
          </div>
          <br>
          <h1>Tips de iluminacion</h1>
            <div class="md-2">
            <div class="row row-cols-1 row-cols-md-2 g-2">
                @foreach( $tips as $tip)
                <a href="{{route('tips.show',$tip->id)}}" class="col" style="margin-top:20px">
                    <div class="card text-white shadow">
                        <img src="{{URL::asset('../storage/app/public/uploads/'.$tip->image)}}" class="card-img" alt="...">
                        <div class="card-img-overlay mx-auto">
                            <div class="carousel-caption d-none d-md-block" style="padding:10px">
                                <p class="card-title text-white"> {{$tip->title}}</p>
                                <p class="card-title text-muted"> {{$tip->content}}</p>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
            </div>
        </div>
        
      <br><br>
      <div class="d-flex justify-content-center" style="margin-top:20px">
      </div>
    </div>
  @endsection