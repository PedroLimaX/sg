<div class="row">
    <div class="col">
        
        
        {{ Form::select('product_id', $products, $cart->product_id, ['hidden','class' => 'form-control' . ($errors->has('product_id') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
        {!! $errors->first('product_id', '<div class="invalid-feedback">:message</p>') !!}
        
        
        {{ Form::text('quant_product', $cart->quant_product, ['hidden','class' => 'form-control' . ($errors->has('quant_product') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
        {!! $errors->first('quant_product', '<div class="invalid-feedback">:message</p>') !!}
        

        {{ Form::text('subtotal', $cart->subtotal, ['hidden','class' => 'form-control' . ($errors->has('subtotal') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
        {!! $errors->first('subtotal', '<div class="invalid-feedback">:message</p>') !!}
        

        {{ Form::select('provider_id', $providers, $cart->provider_id, ['hidden','class' => 'form-control' . ($errors->has('provider_id') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
        {!! $errors->first('provider_id', '<div class="invalid-feedback">:message</p>') !!}
        

        {{ Form::select('user_id', $users, $cart->user_id, ['hidden','class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
        {!! $errors->first('user_id', '<div class="invalid-feedback">:message</p>') !!}
        

        {{ Form::label('Estado') }}
        {{ Form::select('cart_status_id', $cartstatus, $cart->cart_status_id, ['class' => 'form-control' . ($errors->has('cart_status_id') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
        {!! $errors->first('cart_status_id', '<div class="invalid-feedback">:message</p>') !!}
        <br>
    </div>
</div>
<br>
<div class="col-md-3 offset-md-9">
    <button type="submit" class="btn btn-primary btn-lg">
        <i class="fas fa-save"></i>
    </button>
</div>
