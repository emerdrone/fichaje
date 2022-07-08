<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">

        </h3>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card-body">

                <div class="form-group">
                    <small>{{ Form::label('Provincia') }}</small>
                    {{ Form::text('nombre', $provin->nombre, ['class' => 'form-control form-control-sm' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card-body">

                <div class="form-group">
                    <small>{{ Form::label('Pais') }}</small>
                    {!! Form::select('territorio_id', $list, $provin->territorio_id, ['class' => 'form-control form-control-sm' . ($errors->has('territorio_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione Pais']) !!}

                    {!! $errors->first('territorio_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    </div>
</div>
