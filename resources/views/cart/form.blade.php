<div class="row">
    <div class="col-sm-4">            
        <img class="rounded" src="../storage/app/public/uploads/{{$cart->image}}" width="300" alt="">
        <input class="form-control btn-secondary" type="file" name="image" value="" id="image">
    </div>
    <div class="col">
        {{ Form::label('Nombre') }}
        {{ Form::select('product_id', $products, $cart->product_id, ['class' => 'form-control' . ($errors->has('product_id') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
        {!! $errors->first('product_id', '<div class="invalid-feedback">:message</p>') !!}
        <br>

        {{ Form::label('Cantidad') }}
        {{ Form::text('quant_product', $cart->quant_product, ['class' => 'form-control' . ($errors->has('quant_product') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
        {!! $errors->first('quant_product', '<div class="invalid-feedback">:message</p>') !!}
        <br>

        {{ Form::label('Especificaciones') }}
        {{ Form::textarea('specs', $cart->specs, ['class' => 'form-control' . ($errors->has('specs') ? ' is-invalid' : ''), 'placeholder' => 'Especificaciones']) }}
        {!! $errors->first('specs', '<div class="invalid-feedback">:message</p>') !!}
        <br>
        <div class="row">
            <div class="col">
                {{ Form::label('Stock') }}
                {{ Form::text('stock', $cart->stock, ['class' => 'form-control' . ($errors->has('stock') ? ' is-invalid' : ''), 'placeholder' => 'Stock']) }}
                {!! $errors->first('stock', '<div class="invalid-feedback">:message</p>') !!}       
            </div>

            <div class="col">
                {{ Form::label('Precio') }}
                {{ Form::text('price', $cart->price, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => 'Precio']) }}
                {!! $errors->first('price', '<div class="invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <br>
            {{ Form::label('Materiales') }}
            {{ Form::text('materials', $cart->materials, ['class' => 'form-control' . ($errors->has('materials') ? ' is-invalid' : ''), 'placeholder' => 'Materiales']) }}
            {!! $errors->first('materials', '<div class="invalid-feedback">:message</p>') !!}
        <br>
        <div class="row">
            <div class="col">
                {{ Form::label('Proveedor') }}
                {{ Form::select('provider_id', $providers, $cart->provider_id, ['class' => 'form-control' . ($errors->has('provider_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar Proveedor']) }}
                {!! $errors->first('provider_id', '<div class="invalid-feedback">:message</p>') !!}
            </div>
            <div class="col">
                {{ Form::label('Categoria') }}
                {{ Form::select('user_id', $users, $cart->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar Categoria']) }}
                {!! $errors->first('user_id', '<div class="invalid-feedback">:message</p>') !!}
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
