<div class="box box-info padding-1">
    <div class="box-body">
    <div class="row">
    <div class="col-sm-4">
            <img class="rounded" src="../storage/app/public/uploads/{{$user->image}}" width="300" alt="">
        <input class="form-control btn-secondary" type="file" name="image" value="" id="image">
    </div>
    <div class="col">
    
            {{ Form::label('Nombre') }}
            @if(Auth::user()->id==$user->id)
                {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'name']) }} 
            @else 
                {{ Form::text('name', $user->name, ['disabled'=>'disabled', 'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'name']) }} 
            @endif
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
            <br>
            {{ Form::label('Correo') }}
            @if(Auth::user()->id==$user->id)
                {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'email']) }} 
            @else 
                {{ Form::text('email', $user->email, ['disabled'=>'disabled', 'class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'email']) }} 
            @endif
            {!! $errors->first('email', '<div class="invalid-feedback">:message</p>') !!}
            <br>
            {{ Form::label('Direccion') }}
            @if(Auth::user()->id==$user->id)
                {{ Form::text('address', $user->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'address']) }} 
            @else 
                {{ Form::text('address', $user->address, ['disabled'=>'disabled', 'class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'address']) }} 
            @endif
            {!! $errors->first('address', '<div class="invalid-feedback">:message</p>') !!}
            <br>
            <div class="row">
                <div class="col">
                    {{ Form::label('Telefono') }}
                    @if(Auth::user()->id==$user->id)
                        {{ Form::text('telephone', $user->telephone, ['class' => 'form-control' . ($errors->has('telephone') ? ' is-invalid' : ''), 'placeholder' => 'telephone']) }} 
                    @else 
                        {{ Form::text('telephone', $user->telephone, ['disabled'=>'disabled', 'class' => 'form-control' . ($errors->has('telephone') ? ' is-invalid' : ''), 'placeholder' => 'telephone']) }} 
                    @endif
                    {!! $errors->first('telephone', '<div class="invalid-feedback">:message</p>') !!}
                </div>
                @if(Auth::user()->rol_id=="2")
                <div class="col">
                {{ Form::label('Proveedor') }}
                {{ Form::select('provider_id', $providers, $user->provider_id, ['class' => 'form-control' . ($errors->has('provider_id') ? ' is-invalid' : ''), 'placeholder' => 'provider_id']) }}
                {!! $errors->first('provider_id', '<div class="invalid-feedback">:message</p>') !!}
                @endif
                @if($user->rol_id==2)
                @if(Auth::user()->rol_id=="1")
                <div class="col">
                {{ Form::label('Proveedor') }}
                {{ Form::select('provider_id', $providers, $user->provider_id, ['class' => 'form-control' . ($errors->has('provider_id') ? ' is-invalid' : ''), 'placeholder' => 'Asignar proveedor']) }}
                {!! $errors->first('provider_id', '<div class="invalid-feedback">:message</p>') !!}
                @endif
                </div>
                @endif
            </div>
            <br>
                @if(Auth::user()->rol_id=="1")
                {{ Form::label('Rol') }}
                {{ Form::select('rol_id', $rols, $user->rol_id, ['class' => 'form-control' . ($errors->has('rol_id') ? ' is-invalid' : ''), 'placeholder' => 'Asignar Rol']) }}
                {!! $errors->first('rol_id', '<div class="invalid-feedback">:message</p>') !!}
                @endif
            <br>
   </div>
</div>

<br>

<div class="col-md-3 offset-md-10">
    <input class="btn btn-primary" type="submit" value="Guardar">
</div>