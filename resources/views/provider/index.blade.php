@extends('layouts.app')

@section('template_title')
    provider
@endsection

@section('content')<!--a
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('provider') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('providers.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
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
                                        
										<th>code</th>
										<th>name</th>
										<th>description</th>
										<th>email</th>
										<th>image</th>
										<th>telephone</th>
										<th>location</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($providers as $provider)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $provider->code }}</td>
											<td>{{ $provider->name }}</td>
											<td>{{ $provider->description }}</td>
											<td>{{ $provider->email }}</td>
											<td>{{ $provider->image }}</td>
											<td>{{ $provider->telephone }}</td>
											<td>{{ $provider->location }}</td>
                                            <td>
                                                <form action="{{ route('providers.destroy',$provider->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('providers.show',$provider->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('providers.edit',$provider->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $providers->links() !!}
            </div>
        </div>
    </div>
-->
    <div class="container">
  @if(Session::has('mensaje'))
    <div class="alert alert-success" roler="alert">
    {{ Session::get('mensaje') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>

</div>
@endif
<br>
@if(Auth::user()->rol_id==1)
<a href="{{ route('providers.create') }}" class="btn btn-tertiary"><i class="fas fa-user-plus"></i> Nuevo Proveedor</a>
<br><br>
@endif
<div class="row row-cols-1 row-cols-md-4 g-4" >
        @foreach( $providers as $provider)

        
  <div class="col">
    <div class="card h-100 text-center">
    <a href="{{ route('providers.show',$provider->id) }}" class="card-link">
        <img class="rounded mx-auto d-block" src="../storage/app/public/uploads/{{$provider->image}}" width="60%" style="margin:5%" alt="Imagen no disponible">
            </a>
    
        <div class="card-body">
            <a href="{{ route('providers.show',$provider->id) }}" class="card-link">
            <h5 class="card-title">{{ $provider->name}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Contactos</h6>
            <p class="card-text">{{ $provider->telephone}}</p>
            <p class="card-text">{{ $provider->email}}</p>
            </a>
        </div>
        @if(Auth::user()->rol_id==1)
        <div class="card-footer text-muted">
            <form action="{{ route('providers.destroy',$provider->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-trash"></i></button>
            </form>
        </div>
        @endif
    </div>
  </div>
  
        @endforeach

        

{!! $providers->links()!!}


@endsection







