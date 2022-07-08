<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">

        </h3>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card-body">

                <div class="form-group">
                    <small>{{ Form::label('Localidad') }}</small>
                    {{ Form::text('nombre', $localidad->nombre, ['class' => 'form-control form-control-sm' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card-body">

                <div class="form-group">
                    <small>{{ Form::label('Provincia') }}</small>
                    {!! Form::select('provin_id', $provincias, $localidad->provin_id, ['class' => 'form-control form-control-sm' . ($errors->has('provin_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione Provincia']) !!}
                    {!! $errors->first('provin_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    </div>
</div>
