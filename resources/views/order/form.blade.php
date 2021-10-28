
    <div class="row">
    <div class="col-sm-4">
            
            <img class="rounded" src="../storage/app/public/uploads/{{$order->image}}" width="300" alt="">
        
        <input class="form-control btn-secondary" type="file" name="image" value="" id="image">
    </div>
    <div class="col">
            {{ Form::label('Clave') }}
            {{ Form::text('code', $order->code, ['class' => 'form-control' . ($errors->has('code') ? ' is-invalid' : ''), 'placeholder' => 'Clave']) }}
            {!! $errors->first('code', '<div class="invalid-feedback">:message</p>') !!}
            <br>

            {{ Form::label('Nombre') }}
            {{ Form::text('name', $order->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
            <br>

            {{ Form::label('Descripcion') }}
            {{ Form::textarea('description', $order->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</p>') !!}
            <br>

            {{ Form::label('Especificaciones') }}
            {{ Form::textarea('specs', $order->specs, ['class' => 'form-control' . ($errors->has('specs') ? ' is-invalid' : ''), 'placeholder' => 'Especificaciones']) }}
            {!! $errors->first('specs', '<div class="invalid-feedback">:message</p>') !!}
            <br>
            <div class="row">
                <div class="col">
                {{ Form::label('Stock') }}
                {{ Form::text('stock', $order->stock, ['class' => 'form-control' . ($errors->has('stock') ? ' is-invalid' : ''), 'placeholder' => 'Stock']) }}
                {!! $errors->first('stock', '<div class="invalid-feedback">:message</p>') !!}
                        
                </div>
                <div class="col">
                {{ Form::label('Precio') }}
                {{ Form::text('price', $order->price, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => 'Precio']) }}
                {!! $errors->first('price', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>
            <br>
            {{ Form::label('Materiales') }}
            {{ Form::text('materials', $order->materials, ['class' => 'form-control' . ($errors->has('materials') ? ' is-invalid' : ''), 'placeholder' => 'Materiales']) }}
            {!! $errors->first('materials', '<div class="invalid-feedback">:message</p>') !!}
            <br>
            
   </div>
</div>

<br>

<div class="col-md-3 offset-md-10">
    <button type="submit" class="btn btn-primary btn-lg">
        <i class="fas fa-save"></i>
    </button>
</div>
