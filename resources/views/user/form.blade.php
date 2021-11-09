<div class="row">
    <div class="col-sm-4">
            <img class="rounded shadow" src="{{asset('../storage/app/public/uploads/'.$user->image)}}" width="300" alt="">
            <br><br>
        <input class="form-control btn" type="file" name="image" value="{{isset($user->image)}}" id="image">
    </div>
    @if(Auth::user()->id==$user->id)
    <div class="col">
        {{ Form::label('Nombre') }}
        {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
        {!! $errors->first('name', '<p class="invalid-feedback">:message</p>') !!}
        <br>
        {{ Form::label('Correo') }}
        {{ Form::text('email', $user->email, ['hidden','class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
        {!! $errors->first('email', '<p class="invalid-feedback">:message</p>') !!}
        <p class="text-break">{{$user->email}}</p>

        {{ Form::text('password', $user->password, ['hidden', 'class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
        {!! $errors->first('password', '<p class="invalid-feedback">:message</p>') !!}

        <br>
        {{ Form::label('Direccion') }}
        {{ Form::text('address', $user->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
        {!! $errors->first('address', '<p class="invalid-feedback">:message</p>') !!}
        <br>
        {{ Form::label('Telefono') }}
        {{ Form::text('telephone', $user->telephone, ['class' => 'form-control' . ($errors->has('telephone') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
        {!! $errors->first('telephone', '<p class="invalid-feedback">:message</p>') !!}
        <br>
        <div class="row">
            <div class="col">
                {{ Form::select('rol_id', $rols, $user->rol_id, ['hidden','class' => 'form-control' . ($errors->has('rol_id') ? ' is-invalid' : ''), 'placeholder' => 'Rol']) }}
                {!! $errors->first('rol_id', '<p class="invalid-feedback">:message</p>') !!}
                <p class="text-break">{{$user->rol->name}}</p>
            </div>
            @if(isset($user->provider_id))
            <div class="col">
                {{ Form::label('Proveedor') }}
                {{ Form::select('provider_id', $providers, $user->provider_id, ['hidden','class' => 'form-control' . ($errors->has('provider_id') ? ' is-invalid' : ''), 'placeholder' => 'Proveedor']) }}
                {!! $errors->first('provider_id', '<p class="invalid-feedback">:message</p>') !!}  
                <p class="text-break">{{$user->provider->name}}</p>
            </div>
            @endif
        </div>
        <br>    
    </div>
    @elseif(Auth::user()->rol_id==1)
    <div class="col">
        {{ Form::label('Nombre') }}
        {{ Form::text('name', $user->name, ['hidden','class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
        {!! $errors->first('name', '<p class="invalid-feedback">:message</p>') !!}
        <p class="text-break">{{$user->name}}</p>

        <br>
        {{ Form::label('Correo') }}
        {{ Form::text('email', $user->email, ['hidden','class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
        {!! $errors->first('email', '<p class="invalid-feedback">:message</p>') !!}
        <p class="text-break">{{$user->email}}</p>

        
        {{ Form::text('password', $user->password, ['hidden','class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
        {!! $errors->first('password', '<p class="invalid-feedback">:message</p>') !!}

        <br>
        {{ Form::label('Direccion') }}
        {{ Form::text('address', $user->address, ['hidden','class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
        {!! $errors->first('address', '<p class="invalid-feedback">:message</p>') !!}
        <p class="text-break">{{$user->address}}</p>

        <br>
        {{ Form::label('Telefono') }}
        {{ Form::text('telephone', $user->telephone, ['hidden','class' => 'form-control' . ($errors->has('telephone') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
        {!! $errors->first('telephone', '<p class="invalid-feedback">:message</p>') !!}
        <p class="text-break">{{$user->telephone}}</p>

        <br>
        <div class="alert alert-info alert-dismissible d-flex align-items-center fade show" roler="alert">
            <i class="fas fa-info-circle"></i>
                <strong class="mx-2">Importante!</strong>Modificar el rol cliente a proveedor requiere asignarle la empresa a la que pertenece dicho usuario
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-left:10px">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="row">
            <div class="col">
                {{ Form::label('Rol') }}
                {{ Form::select('rol_id', $rols, $user->rol_id, ['class' => 'form-control' . ($errors->has('rol_id') ? ' is-invalid' : ''), 'placeholder' => 'Rol']) }}
                {!! $errors->first('rol_id', '<p class="invalid-feedback">:message</p>') !!}
            </div>
            <div class="col">
                {{ Form::label('Proveedor') }}
                {{ Form::select('provider_id', $providers, $user->provider_id, ['class' => 'form-control' . ($errors->has('provider_id') ? ' is-invalid' : ''), 'placeholder' => 'Proveedor']) }}
                {!! $errors->first('provider_id', '<p class="invalid-feedback">:message</p>') !!}   
            </div>
        </div>
        <br>    
    </div>
    @endif
</div>
<br>
<div class="col-md-2 offset-md-10">
    <button type="submit" class="btn btn-primary btn-lg">
        <i class="fas fa-save"></i>
    </button>
</div>
