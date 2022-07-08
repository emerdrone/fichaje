<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">

        </h3>
    </div>
    <div class="row">

        <div class="col-lg-12">
            <div class="card-body">
                <div class="row">
                <div class="form-group col-lg-4">
                    <small>{{ Form::label('Nombre Empresa') }}</small>
                    {{ Form::text('nombre', $empresa->nombre, ['class' => 'form-control form-control-sm' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group col-lg-4">
                    <small>{{ Form::label('CIF') }}</small>
                    {{ Form::text('Nif', $empresa->Nif, ['class' => 'form-control form-control-sm' . ($errors->has('Nif') ? ' is-invalid' : ''), 'placeholder' => 'Nif Empresa']) }}
                    {!! $errors->first('Nif', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group col-lg-4">
                    <small>{{ Form::label('Dirección') }}</small>
                    {{ Form::text('Direccion', $empresa->Direccion, ['class' => 'form-control form-control-sm' . ($errors->has('Direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
                    {!! $errors->first('Direccion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group col-lg-4">
                    <small>{{ Form::label('Telefono') }}</small>
                    {{ Form::text('Telefono', $empresa->Telefono, ['class' => 'form-control form-control-sm' . ($errors->has('Telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
                    {!! $errors->first('Telefono', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group col-lg-4">
                    <small>{{ Form::label('Codigo Postal') }}</small>
                    {{ Form::text('Cp', $empresa->Cp, ['class' => 'form-control form-control-sm' . ($errors->has('Cp') ? ' is-invalid' : ''), 'placeholder' => 'Codigo Postal']) }}
                    {!! $errors->first('Cp', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group col-lg-4">
                    <small>{{ Form::label('Correo Electronico') }}</small>
                    {{ Form::text('Email', $empresa->Email, ['class' => 'form-control form-control-sm' . ($errors->has('Email') ? ' is-invalid' : ''), 'placeholder' => 'Correo Electronico']) }}
                    {!! $errors->first('Email', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group col-lg-4">
                    <small>{{ Form::label('Pais') }}</small>
                    {!! Form::select('territorio_id', $territorios, $empresa->territorio_id, ['class' => 'form-control form-control-sm' . ($errors->has('territorio_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione Pais']) !!}
                    {!! $errors->first('territorio_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group col-lg-4">
                    <small>{{ Form::label('Provincia') }}</small>
                    {!! Form::select('provin_id', $provincias, $empresa->provin_id, ['class' => 'form-control form-control-sm' . ($errors->has('provincia_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione Provincia', 'id' => 'select-provincia']) !!}
                    {!! $errors->first('provin_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group col-lg-4">
                    <small>{{ Form::label('Localidad') }}</small>
                    {!! Form::select('localidad_id', $municipios, $empresa->localidad_id, ['class' => 'form-control form-control-sm' . ($errors->has('provincia_id') ? ' is-invalid' : '')]) !!}

                    {!! $errors->first('provincia_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>


                </div>
            </div>
        </div>

</div>
