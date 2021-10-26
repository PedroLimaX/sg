<div class="row">
    <div class="col-sm-4">
            <img class="rounded shadow" src="{{asset('../storage/app/public/uploads/'.$user->image)}}" width="300" alt="">
            <br><br>
        <input class="form-control btn" type="file" name="image" value="{{isset($user->image)}}" id="image">
    </div>
    <div class="col">
        {{ Form::label('Nombre') }}
        @if(Auth::user()->id==$user->id)
            {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('name', '<p class="invalid-feedback">:message</p>') !!}
        @else
            {{ Form::hidden('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('name', '<p class="invalid-feedback">:message</p>') !!}
            <p class="text-break">{{ $user->name}}</p>
        @endif
        <br>

        {{ Form::label('Correo') }}
        {{ Form::hidden('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
        {!! $errors->first('email', '<p class="invalid-feedback">:message</p>') !!}
        <p class="text-break">{{ $user->email}}</p>
        <br>

        {{ Form::label('Direccion') }}
        @if(Auth::user()->id==$user->id)
            {{ Form::text('address', $user->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
            {!! $errors->first('address', '<p class="invalid-feedback">:message</p>') !!}
        @else
            {{ Form::hidden('address', $user->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
            {!! $errors->first('address', '<p class="invalid-feedback">:message</p>') !!}
            <p class="text-break">{{ $user->address}}</p>
        @endif
        <br>

        {{ Form::label('Telefono') }}
        @if(Auth::user()->id==$user->id)
            {{ Form::text('telephone', $user->telephone, ['class' => 'form-control' . ($errors->has('telephone') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
            {!! $errors->first('telephone', '<p class="invalid-feedback">:message</p>') !!}
        @else
            {{ Form::hidden('telephone', $user->telephone, ['class' => 'form-control' . ($errors->has('telephone') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
            {!! $errors->first('telephone', '<p class="invalid-feedback">:message</p>') !!}
            <p class="text-break">{{ $user->telephone}}</p>
        @endif
        <br>
        <div class="row">
            <div class="col">
                @if(Auth::user()->id==1)
                    {{ Form::label('Rol') }}
                    {{ Form::select('rol_id', $rols, $user->rol_id, ['class' => 'form-control' . ($errors->has('rol_id') ? ' is-invalid' : ''), 'placeholder' => 'Rol']) }}
                    {!! $errors->first('rol_id', '<p class="invalid-feedback">:message</p>') !!}
                @else
                    {{ Form::select('rol_id', $rols, $user->rol_id, ['hidden', 'class' => 'form-control' . ($errors->has('rol_id') ? ' is-invalid' : ''), 'placeholder' => 'Rol']) }}
                    {!! $errors->first('rol_id', '<p class="invalid-feedback">:message</p>') !!}
                @endif
                    
            </div>
            <div class="col">
                @if(Auth::user()->id==1)
                    @if($user->rol_id==2)
                        {{ Form::label('Proveedor') }}
                        {{ Form::select('provider_id', $providers, $user->provider_id, ['class' => 'form-control' . ($errors->has('provider_id') ? ' is-invalid' : ''), 'placeholder' => 'Proveedor']) }}
                        {!! $errors->first('provider_id', '<p class="invalid-feedback">:message</p>') !!}
                    @endif
                    @else
                        {{ Form::select('provider_id', $providers, $user->provider_id, ['hidden','class' => 'form-control' . ($errors->has('provider_id') ? ' is-invalid' : ''), 'placeholder' => 'Proveedor']) }}
                        {!! $errors->first('provider_id', '<p class="invalid-feedback">:message</p>') !!}
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
