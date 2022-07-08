<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">

        </h3>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card-body">

                <div class="form-group">
                    <small>{{ Form::label('Nombre del pais') }}</small>
                    {{ Form::text('nombre', $territorio->nombre, ['class' => 'form-control form-control-sm' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    </div>
</div>
