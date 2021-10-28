@extends('layouts.app')
  @section('content')
      <div class="container-fluid">
      @if ($message = Session::get('success'))
              <div class="alert alert-success">
                <p>{{ $message }}</p>
              </div>
              @endif
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span id="card_title">{{ __('Mi Carrito') }}</span>
                </div>
              </div>
             
              <div class="card-body">
                
                <div class="table-responsive">
                  <table class="table table-borderless table-hover">
                    <thead class="">
                      <tr>
                        <th>No</th>   
                        <th>Imagen</th>   
                        <th>Producto</th>
                        <th>Precio unitario</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!--{{$accumulated=0}}-->
                    @foreach ($carts as $cart)
                      @if(($cart->user->id)==Auth::user()->id)
                        <tr>
                          <td>{{ ++$i }}</td>
                          <td>
                            <img class="img-thumbnail" src="../storage/app/public/uploads/{{$cart->product->image}}"
                             alt="{{ $cart->product->image}}" width="40px"></td>
                          <td>{{ $cart->product->name }}</td>
                          <td>{{ $cart->product->price}}</td>
                          <td>{{ $cart->quant_product }}</td>
                          <td><b>{{ $cart->subtotal}}</b></td>
                          <td>
                            <form action="{{ route('carts.destroy',$cart->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-minus-circle"></i></button>
                            </form>
                          </td>
                        </tr>
                        <!--{{ $accumulated=$accumulated + $cart->subtotal}}-->
                      @endif
                    @endforeach
                    </tbody>
                  </table>
                    <div class="col-md-3 offset-md-9">
                      <b><span>Total: {{$accumulated}}</p></span>
                    </div>
                    <div class="col-md-3 offset-md-9">
                      <div class="input-group mb-3">
                          <a class="form-control btn btn-primary" href="{{ route('orders.create')}}">Realizar Pedido</a>
                      </div>
                    </div>
                </div>
              </div>
            </div>
            {!! $carts->links() !!}
          </div>
        </div>
    </div>
  @endsection
