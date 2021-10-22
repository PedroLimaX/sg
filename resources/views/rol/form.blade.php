<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $rol->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
            <br>
            <div class="row">
                <div class="col">
                    {{ Form::label('create_permission') }}
                    {{ Form::text('create_permission', $rol->create_permission, ['class' => 'form-control' . ($errors->has('create_permission') ? ' is-invalid' : ''), 'placeholder' => 'create_permission']) }}
                    {!! $errors->first('create_permission', '<div class="invalid-feedback">:message</p>') !!}
                </div>
                <div class="col">
                    {{ Form::label('update_permission') }}
                    {{ Form::text('update_permission', $rol->update_permission, ['class' => 'form-control' . ($errors->has('update_permission') ? ' is-invalid' : ''), 'placeholder' => 'update_permission']) }}
                    {!! $errors->first('update_permission', '<div class="invalid-feedback">:message</p>') !!}    
                </div>
                <div class="col">
                    {{ Form::label('read_permission') }}
                    {{ Form::text('read_permission', $rol->read_permission, ['class' => 'form-control' . ($errors->has('read_permission') ? ' is-invalid' : ''), 'placeholder' => 'read_permission']) }}
                    {!! $errors->first('read_permission', '<div class="invalid-feedback">:message</p>') !!}
                </div>
                <div class="col">
                    {{ Form::label('delete_permission') }}
                    {{ Form::text('delete_permission', $rol->delete_permission, ['class' => 'form-control' . ($errors->has('delete_permission') ? ' is-invalid' : ''), 'placeholder' => 'delete_permission']) }}
                    {!! $errors->first('delete_permission', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>