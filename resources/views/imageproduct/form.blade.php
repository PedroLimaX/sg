<div class="row">
    <div class="col-sm-6">
        <img class="rounded" src="{{asset('../storage/app/public/uploads/imageproducts/'.$imageproduct->image)}}" width="450" alt="">
        <input class="form-control btn" type="file" name="image" value="{{isset($imageproduct->image)}}" id="image">
    </div>
    <div class="col">
        {{ Form::label('Titulo') }}
        {{ Form::text('title', $imageproduct->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
        {!! $errors->first('title', '<p class="invalid-feedback">:message</p>') !!}
        <br>
        {{ Form::label('Descripcion') }}
        {{ Form::text('description', $imageproduct->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion', 'size'=>'20x5']) }}
        {!! $errors->first('description', '<p class="invalid-feedback">:message</p>') !!}
        <br>
        {{ Form::label('Producto') }}
        {{ Form::select('product_id', $products, $imageproduct->product_id, ['class' => 'form-control' . ($errors->has('product_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar Producto']) }}
        {!! $errors->first('product_id', '<p class="invalid-feedback">:message</p>') !!}
        <br>
   </div>
</div>
<br>
<div class="col-md-3 offset-md-10">
    <button type="submit" class="btn btn-primary btn-lg">
        <i class="fas fa-save"></i>
    </button>
</div>
