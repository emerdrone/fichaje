<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">

        </h3>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card-body">

                <div class="form-group">
                    <small>{{ Form::label('Nombre') }}</small>
                    {{ Form::text('name', $user->name, ['class' => 'form-control form-control-sm' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group">
                    <small>{{ Form::label('Dirección') }}</small>
                    {{ Form::text('direccion', $user->direccion, ['class' => 'form-control form-control-sm' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Dirección']) }}
                    {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group">
                    <small>{{ Form::label('Provincia') }}</small>
                    {!! Form::select('provin_id', $provincias, $user->provin_id, ['class' => 'form-control form-control-sm' . ($errors->has('provin_id') ? ' is-invalid' : ''), 'placeholder' => 'Provincia']) !!}
                    {!! $errors->first('provin_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group">
                    <small>{{ Form::label('Empresa') }}</small>
                    {!! Form::select('empresa_id', $empresas, $user->empresa_id, ['class' => 'form-control form-control-sm' . ($errors->has('empresa_id') ? ' is-invalid' : ''), 'placeholder' => 'Empresa']) !!}
                    {!! $errors->first('empresa_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card-body">

                <div class="form-group">
                    <small>{{ Form::label('Correo Electronico') }}</small>
                    {{ Form::text('email', $user->email, ['class' => 'form-control form-control-sm' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Correo Electronico']) }}
                    {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group">
                    <small>{{ Form::label('Codigo Postal') }}</small>
                    {{ Form::text('cp', $user->cp, ['class' => 'form-control form-control-sm' . ($errors->has('cp') ? ' is-invalid' : ''), 'placeholder' => 'Codigo Postal']) }}
                    {!! $errors->first('cp', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group">
                    <small>{{ Form::label('Localidad') }}</small>
                    {!! Form::select('localidad_id', $localidades, $user->localidad_id, ['class' => 'form-control form-control-sm' . ($errors->has('localidad_id') ? ' is-invalid' : ''), 'placeholder' => 'Localidad']) !!}
                    {!! $errors->first('localidad_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group">
                    <small>{{ Form::label('Contraseña') }}</small>
                  
                    {{ Form::password('password', array('id' => 'password', 'class' => 'form-control form-control-sm' . ($errors->has('password') ? ' is-invalid' : ''), "autocomplete" => "off", 'placeholder' => '*********'),$user->password) }}

                    {{-- <input type="password" value="{{ $user->password }}" class="form-control form-control-sm" >
                    {{ Form::text('password', ['class' => 'form-control form-control-sm' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Contraseña']) }} --}}
                    {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                </div>

            </div>
        </div>
    </div>
</div>
