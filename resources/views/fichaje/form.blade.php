<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('horainicio') }}
            {{ Form::text('horainicio', $fichaje->horainicio, ['class' => 'form-control' . ($errors->has('horainicio') ? ' is-invalid' : ''), 'placeholder' => 'Horainicio']) }}
            {!! $errors->first('horainicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('horafin') }}
            {{ Form::text('horafin', $fichaje->horafin, ['class' => 'form-control' . ($errors->has('horafin') ? ' is-invalid' : ''), 'placeholder' => 'Horafin']) }}
            {!! $errors->first('horafin', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estadofichaje') }}
            {{ Form::text('estadofichaje', $fichaje->estadofichaje, ['class' => 'form-control' . ($errors->has('estadofichaje') ? ' is-invalid' : ''), 'placeholder' => 'Estadofichaje']) }}
            {!! $errors->first('estadofichaje', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('geolatini') }}
            {{ Form::text('geolatini', $fichaje->geolatini, ['class' => 'form-control' . ($errors->has('geolatini') ? ' is-invalid' : ''), 'placeholder' => 'Geolatini']) }}
            {!! $errors->first('geolatini', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('geolonini') }}
            {{ Form::text('geolonini', $fichaje->geolonini, ['class' => 'form-control' . ($errors->has('geolonini') ? ' is-invalid' : ''), 'placeholder' => 'Geolonini']) }}
            {!! $errors->first('geolonini', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $fichaje->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>