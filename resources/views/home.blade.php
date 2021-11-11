@extends('layouts.app')
  @section('content') 
  @if(Auth::check())
        @if(Auth::user()->id==1)
          <a href="{{ route('sliders.index') }}" class="btn btn-tertiary"><i class="fa fa-fw fa-images"></i>Editar sliders</a>
          <a href="{{ route('tips.index') }}" class="btn btn-tertiary"><i class="fas fa-clipboard-check"></i> Editar tips</a>
        @endif
    @endif
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner shadow">
            <div class="carousel-item active " data-bs-interval="5000">
              <img src="{{ url('../storage/app/public/uploads/sliders/slider_default.jpg') }}" class="d-block w-100" alt="wallpaper 1">
              <div class="carousel-caption d-none d-md-block">
                <p class="text-white">Slogan de SG Iluminacion</p>
              </div>
            </div>
            @foreach($sliders as $slider)
              <div class="carousel-item" data-bs-interval="5000">
                <img src="{{ url('../storage/app/public/uploads/sliders/'.$slider->image) }}" class="d-block w-100" alt="wallpaper 2">
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
    <div class="container">
      @if(Session::has('mensaje'))
        <div class="alert alert-success" roler="alert">
          {{ Session::get('mensaje') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
      <br><br>
          <h1>Tips de iluminacion</h1>
            <div class="md-2">
              <div class="row row-cols-1 row-cols-md-2 g-2">
                @foreach( $tips as $tip)
                <a href="{{route('tips.show',$tip->id)}}" class="col" style="margin-top:20px">
                    <div class="card text-white shadow">
                        <img src="{{URL::asset('../storage/app/public/uploads/tips/'.$tip->image)}}" class="card-img" alt="...">
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

        <div class="container">
      <h1>Acerca de SG Iluminacion</h1>
        <div class="container">
          <div id="accordion">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h3 class="mb-0">
                  <button class="btn link-color" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Mision de SG Iluminacion
                  </button>
                </h3>
              </div>

              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                  Mision xd<br> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingTwo">
                <h3 class="mb-0">
                  <button class="btn link-color collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Vision de SG Iluminacion
                  </button>
                </h3>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                  Vision<br> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingThree">
                <h3 class="mb-0">
                  <button class="btn link-color collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Acerca de # 3
                  </button>
                </h3>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                  Tetsto del Acerca de 3<br> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="gallery-main">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <figure>
            <img class="img-fluid" src="{{URL::asset('../storage/app/public/sg_logo.png')}}" width="150%" alt="sg_logo.png">
            <figcaption><small>SG Iluminacion</small></figcaption>
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
      <br><br>
      <div class="d-flex justify-content-center" style="margin-top:20px">
      </div>
    </div>
  @endsection