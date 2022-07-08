<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">

        </h3>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card-body">
                <div class="row">
                <div class="form-group col-lg-6">
                    <small>{{ Form::label('Nombre Usuario') }} <sup class="text-danger">*</sup></small>
                    {{ Form::text('name', $user->name, ['class' => 'form-control form-control-sm' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese Nombre de Usuario', 'autofocus', 'tabindex' => '1']) }}
                    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group col-lg-6">
                    <small>{{ Form::label('Correo Electrónico') }}<sup class="text-danger">*</sup></small>
                    {{ Form::text('email', $user->email, ['class' => 'form-control form-control-sm' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese Correo Electrónico', 'tabindex' => '2']) }}
                    {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group col-lg-6">
                    <small>{{ Form::label('Dirección') }}</small>
                    {{ Form::text('direccion', $user->direccion, ['class' => 'form-control form-control-sm' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese Dirección', 'tabindex' => '3']) }}
                    {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group col-lg-6">
                    <small>{{ Form::label('Código Postal') }}</small>
                    {{ Form::text('cp', $user->cp, ['class' => 'form-control form-control-sm' . ($errors->has('cp') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese Código Postal', 'tabindex' => '4']) }}
                    {!! $errors->first('cp', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group col-lg-6">
                    <small>{{ Form::label('Provincia') }}</small>
                    {!! Form::select('provin_id', $provincias, $user->provin_id, ['class' => 'form-control form-control-sm' . ($errors->has('provincia_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione Provincia', 'id' => 'select-provincia',  'tabindex' => '5']) !!}
                    {!! $errors->first('provin_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group col-lg-6">
                    <small>{{ Form::label('Localidad') }}</small>
                    {!! Form::select('localidad_id', ['placeholder' => 'Selecciona Localidad'], null, ['id' => 'select-localidad', 'class' => 'form-control form-control-sm' . ($errors->has('localidad_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione Provincia',  'tabindex' => '6']) !!}
                    {!! $errors->first('localidad_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group col-lg-6">
                    <small>{{ Form::label('Teléfono') }}</small>
                    {!! Form::text('telefono', $user->Telefono, ['class' => 'form-control form-control-sm' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese Teléfono', 'tabindex' => '7']) !!}
                    {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group col-lg-6">
                    <small>{{ Form::label('Contraseña') }}<sup class="text-danger">*</sup></small>
                    {{ Form::text('password', $user->password, ['class' => 'form-control form-control-sm' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese Contraseña', 'tabindex' => '8']) }}
                    {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group col-lg-6">
                    <small>{{ Form::label('Empresa') }}</small>
                    {!! Form::select('empresa_id', $empresas, $user->empresa_id, ['class' => 'form-control form-control-sm' . ($errors->has('empresa_id') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese Empresa', 'tabindex' => '9']) !!}
                    {!! $errors->first('empresa_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group col-lg-6">
                    <small>{{ Form::label('Comentario') }}</small>
                    {!! Form::text('comentario', $user->comentario, ['class' => 'form-control form-control-sm' . ($errors->has('comentario') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese Comentario', 'tabindex' => '10']) !!}
                    {!! $errors->first('comentario', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
