<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-sm-4">
                <img class="rounded shadow" src="{{asset('../storage/app/public/uploads/providers/'.$provider->image)}}" width="300" alt="">
                <br><br>
                <input class="form-control btn" type="file" name="image" value="{{isset($provider->image)}}" id="image">
            </div>
            <div class="col">
                {{ Form::label('Nombre') }}
                {{ Form::text('name', $provider->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
                <br>

                {{ Form::label('Descripcion') }}
                {{ Form::textarea('description', $provider->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion', 'size'=>'20x5']) }}
                {!! $errors->first('description', '<div class="invalid-feedback">:message</p>') !!}
                <br>

                {{ Form::label('Ubicacion') }}
                {{ Form::text('location', $provider->location, ['class' => 'form-control' . ($errors->has('location') ? ' is-invalid' : ''), 'placeholder' => 'Ubicacion']) }}
                {!! $errors->first('location', '<div class="invalid-feedback">:message</p>') !!}
                <br>
                <div class="row">
                    <div class="col">
                        {{ Form::label('Correo') }}
                        {{ Form::text('email', $provider->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Correo']) }}
                        {!! $errors->first('email', '<div class="invalid-feedback">:message</p>') !!}
                    </div>
                    <div class="col">
                        {{ Form::label('Telefono') }}
                        {{ Form::text('telephone', $provider->telephone, ['class' => 'form-control' . ($errors->has('telephone') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
                        {!! $errors->first('telephone', '<div class="invalid-feedback">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="col-md-2 offset-md-9">
            <button type="submit" class="btn btn-primary btn-lg">
                <i class="fas fa-save"></i>
            </button>
        </div>
    </div>
</div>