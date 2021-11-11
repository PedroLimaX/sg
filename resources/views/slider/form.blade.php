<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            
            <div class="col-sm-6">
                <img class="rounded shadow" src="{{asset('../storage/app/public/uploads/sliders/'.$slider->image)}}" width="100%" alt="">
                <br><br>
                <input class="form-control btn" type="file" name="image" value="{{isset($slider->image)}}" id="image">
            </div>
            <div class="col">
                {{ Form::label('Titulo') }}
                {{ Form::text('title', $slider->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Titulo']) }}
                {!! $errors->first('title', '<div class="invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <br>
        <div class="col-md-2 offset-md-10">
            <button type="submit" class="btn btn-primary btn-lg">
                <i class="fas fa-save"></i>
            </button>
        </div>
    </div>
</div>