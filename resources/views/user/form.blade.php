<div class="row">
    <div class="col-sm-4">
        @if(isset($user->image))
            <img class="rounded" src="../storage/app/public/uploads/{{$user->image}}" width="300" alt="">
        @endif
        <input class="form-control btn-secondary" type="file" name="image" value="" id="image">
    </div>
    <div class="col">
        {{ Form::label('Nombre') }}
        @if(Auth::user()->id==$user->id)
            {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
        @else
            <p class="text-break">{{ $user->name}}</p>
        @endif
        <br>

        {{ Form::label('Correo') }}
        <p class="text-break">{{ $user->email}}</p>
        <br>

        {{ Form::label('Direccion') }}
        @if(Auth::user()->id==$user->id)
            {{ Form::text('address', $user->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
            {!! $errors->first('address', '<div class="invalid-feedback">:message</p>') !!}
        @else
            <p class="text-break">{{ $user->address}}</p>
        @endif
        <br>

        {{ Form::label('Telefono') }}
        @if(Auth::user()->id==$user->id)
            {{ Form::text('telephone', $user->telephone, ['class' => 'form-control' . ($errors->has('telephone') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
            {!! $errors->first('telephone', '<div class="invalid-feedback">:message</p>') !!}
        @else
            <p class="text-break">{{ $user->telephone}}</p>
        @endif
        <br>
        <div class="row">
            <div class="col">
                @if(Auth::user()->id==1)
                    {{ Form::label('Rol') }}
                    {{ Form::select('rol_id', $rols, $user->rol_id, ['class' => 'form-control' . ($errors->has('rol_id') ? ' is-invalid' : ''), 'placeholder' => 'Rol']) }}
                    {!! $errors->first('rol_id', '<div class="invalid-feedback">:message</p>') !!}
                @endif
            </div>
            <div class="col">
                @if(Auth::user()->id==1)
                    {{ Form::label('Proveedor') }}
                    {{ Form::select('provider_id', $providers, $user->provider_id, ['class' => 'form-control' . ($errors->has('provider_id') ? ' is-invalid' : ''), 'placeholder' => 'Proveedor']) }}
                    {!! $errors->first('provider_id', '<div class="invalid-feedback">:message</p>') !!}
                @elseif($user->rol_id==2)
                    {{ Form::select('provider_id', $providers, $user->provider_id, ['class' => 'form-control', 'disabled' . ($errors->has('provider_id') ? ' is-invalid' : ''), 'placeholder' => 'Proveedor']) }}
                @endif
            </div>
        </div>
        <br>    
    </div>
</div>
<br>
<div class="col-md-2 offset-md-10">
    <button type="submit" class="btn btn-primary btn-lg">
        <i class="fas fa-save"></i>
    </button>
</div>
