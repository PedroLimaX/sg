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
      <a href="{{ route('imageproducts.create') }}" class="btn btn-tertiary"><i class="fas fa-box"></i> Nuevo imageproducto</a>
      <br><br>
      <div class="gallery-main">
        <div class="row row-cols-1 row-cols-md-4 g-5">
          <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
          <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
          @foreach( $imageproducts as $imageproduct)
            <div class="col" style="margin-top:20px">
              <div class="card h-100 text-center">
                <figure>
                  <img class="img-fluid" src="{{URL::asset('../storage/app/public/uploads/'.$imageproduct->image)}}" width="500" alt="{{$imageproduct->image}}">
                  <figcaption>{{$imageproduct->title}} <small>{{$imageproduct->image}}</small></figcaption>
                </figure>
                <div class="card-body">
                    <span class="card-subtitle mb-2 text-muted">{{ $imageproduct->product->code}}</span>
                </div>
                <div class="card-footer text-muted d-flex justify-content-center">
                  <form action="{{ route('imageproducts.destroy',$imageproduct->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                    <a href="{{ route('imageproducts.edit',$imageproduct->id) }}" class="btn btn-tertiary btn-sm">
                    <i class="fa fa-fw fa-edit"></i></a>
                  </form>
                </div>
              </div>
            </div>
          @endforeach
        </div>
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

      <div class="d-flex justify-content-center" style="margin-top:20px">
        {!! $imageproducts->links() !!}
      </div>
    </div>
    
  @endsection