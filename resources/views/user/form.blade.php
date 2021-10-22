<div class="box box-info padding-1">
    <div class="box-body">
    <div class="row">
    <div class="col-sm-4">
        @if(isset($user->image))
            <img class="rounded" src="../storage/app/public/uploads/{{$user->image}}" width="300" alt="">
        @endif
        <input class="form-control btn-secondary" type="file" name="image" value="" id="image">
    </div>
    <div class="col">
            {{ Form::label('Nombre') }}
                {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'name']) }} 
            {!! $errors->first('name', '<p class="invalid-feedback">:message</p>') !!}
            <br>
            {{ Form::label('Correo') }}
            {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'email']) }} 
            {!! $errors->first('email', '<p class="invalid-feedback">:message</p>') !!}
            <br>
            {{ Form::label('Direccion') }}
            {{ Form::text('address', $user->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'address']) }} 
            {!! $errors->first('address', '<p class="invalid-feedback">:message</p>') !!}   
            <br>
            <div class="row">
                <div class="col">
                    {{ Form::label('Telefono') }}      
                    {{ Form::text('telephone', $user->telephone, ['class' => 'form-control' . ($errors->has('telephone') ? ' is-invalid' : ''), 'placeholder' => 'telephone']) }} 
                    {!! $errors->first('telephone', '<p class="invalid-feedback">:message</p>') !!}
                </div>
                    <div class="col">
                        {{ Form::label('Proveedor') }}
                        {{ Form::select('provider_id', $providers, $user->provider_id, ['class' => 'form-control' . ($errors->has('provider_id') ? ' is-invalid' : ''), 'placeholder' => 'provider_id']) }}
                        {!! $errors->first('provider_id', '<p class="invalid-feedback">:message</p>') !!}
                    </div>
            </div>
            <br>
            {{ Form::label('Rol') }}
            {{ Form::select('rol_id', $rols, $user->rol_id, ['class' => 'form-control' . ($errors->has('rol_id') ? ' is-invalid' : ''), 'placeholder' => 'Asignar Rol']) }}
            {!! $errors->first('rol_id', '<p class="invalid-feedback">:message</p>') !!}
   </div>
</div>

<br>

<div class="col-md-3 offset-md-10">
<button type="submit" class="btn btn-primary btn-lg">
        <i class="fas fa-save"></i>
    </button>
</div>