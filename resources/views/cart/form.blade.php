<div class="row">
    <div class="col">
        {{ Form::label('Nombre') }}
        {{ Form::select('product_id', $products, $cart->product_id, ['class' => 'form-control' . ($errors->has('product_id') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
        {!! $errors->first('product_id', '<div class="invalid-feedback">:message</p>') !!}
        <br>
        
        {{ Form::label('Cantidad') }}
        {{ Form::text('quant_product', $cart->quant_product, ['class' => 'form-control' . ($errors->has('quant_product') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
        {!! $errors->first('quant_product', '<div class="invalid-feedback">:message</p>') !!}
        <br>
    </div>
</div>
<br>
<div class="col-md-3 offset-md-9">
    <button type="submit" class="btn btn-primary btn-lg">
        <i class="fas fa-save"></i>
    </button>
</div>
