@extends('layouts.app')
  @section('content')
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span id="card_title">{{ __('Carrito') }}</span>
                </div>
              </div>
              @if ($message = Session::get('success'))
              <div class="alert alert-success">
                <p>{{ $message }}</p>
              </div>
              @endif
              <div class="card-body">
                
                <div class="table-responsive">
                  <table class="table table-striped table-hover">
                    <thead class="thead">
                      <tr>
                        <th>No</th>   
                        <th>Imagen</th>   
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio por unidad</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($carts as $cart)
                      @if(($cart->user->id)==Auth::user()->id)
                        <tr>
                          <td>{{ ++$i }}</td>
                          <td>
                            <img class="img-thumbnail" src="../storage/app/public/uploads/{{$cart->product->image}}"
                             alt="{{ $cart->product->image}}" width="40px"></td>
                          <td>{{ $cart->product->name }}</td>
                          <td>{{ $cart->quant_product }}</td>
                          <td>{{ ($cart->product->price)*($cart->quant_product) }}</td>
                          <td>
                            <form action="{{ route('carts.destroy',$cart->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                            </form>
                          </td>
                        </tr>
                      @endif
                    @endforeach
                    </tbody>
                  </table>
                  <a href="{{ url('carts/do-order') }}" class="btn btn-primary">Realizar Pedido</a>
                </div>
              </div>
            </div>
            {!! $carts->links() !!}
          </div>
        </div>
    </div>
  @endsection
