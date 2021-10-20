@extends('layouts.app')

@section('template_title')
    cart
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Carrito') }}
                            </span>
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
                              <td>{{ $cart->product->name }}</td>
                              <td>{{ $cart->quant_product }}</td>
                              <td>{{ ($cart->product->price)*($cart->quant_product) }}</td>
                              <td>
                                <form action="{{ route('carts.destroy',$cart->id) }}" method="POST">
                                  <a class="btn btn-sm btn-success" href="{{ route('carts.edit',$cart->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                </form>
                              </td>
                            </tr>
                            @endif
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                  </div>
              </div>
              {!! $carts->links() !!}
          </div>
      </div>
  </div>
@endsection
