
    <div class="row">
    <div class="col-sm-4">
            
            <img class="rounded" src="../storage/app/public/uploads/{{$product->image}}" width="300" alt="">
        
        <input class="form-control btn-secondary" type="file" name="image" value="" id="image">
    </div>
    <div class="col">
            {{ Form::label('Clave') }}
            {{ Form::text('code', $product->code, ['class' => 'form-control' . ($errors->has('code') ? ' is-invalid' : ''), 'placeholder' => 'Clave']) }}
            {!! $errors->first('code', '<div class="invalid-feedback">:message</p>') !!}
            <br>

            {{ Form::label('Nombre') }}
            {{ Form::text('name', $product->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
            <br>

            {{ Form::label('Descripcion') }}
            {{ Form::textarea('description', $product->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</p>') !!}
            <br>

            {{ Form::label('Especificaciones') }}
            {{ Form::textarea('specs', $product->specs, ['class' => 'form-control' . ($errors->has('specs') ? ' is-invalid' : ''), 'placeholder' => 'Especificaciones']) }}
            {!! $errors->first('specs', '<div class="invalid-feedback">:message</p>') !!}
            <br>
            <div class="row">
                <div class="col">
                {{ Form::label('Stock') }}
                {{ Form::text('stock', $product->stock, ['class' => 'form-control' . ($errors->has('stock') ? ' is-invalid' : ''), 'placeholder' => 'Stock']) }}
                {!! $errors->first('stock', '<div class="invalid-feedback">:message</p>') !!}
                        
                </div>
                <div class="col">
                {{ Form::label('Precio') }}
                {{ Form::text('price', $product->price, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => 'Precio']) }}
                {!! $errors->first('price', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>
            <br>
            {{ Form::label('Materiales') }}
            {{ Form::text('materials', $product->materials, ['class' => 'form-control' . ($errors->has('materials') ? ' is-invalid' : ''), 'placeholder' => 'Materiales']) }}
            {!! $errors->first('materials', '<div class="invalid-feedback">:message</p>') !!}
            <br>
            <div class="row">
                <div class="col">
                {{ Form::label('Proveedor') }}
                {{ Form::select('provider_id', $providers, $product->provider_id, ['class' => 'form-control' . ($errors->has('provider_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar Proveedor']) }}
                {!! $errors->first('provider_id', '<div class="invalid-feedback">:message</p>') !!}
                </div>
                <div class="col">
                {{ Form::label('Categoria') }}
                {{ Form::select('category_id', $categories, $product->category_id, ['class' => 'form-control' . ($errors->has('category_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar Categoria']) }}
                {!! $errors->first('category_id', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>
   </div>
</div>

<br>

<div class="col-md-3 offset-md-10">
    <button type="submit" class="btn btn-primary btn-lg">
        <i class="fas fa-save"></i>
    </button>
</div>
