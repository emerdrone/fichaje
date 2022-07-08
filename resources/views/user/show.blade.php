@extends('adminlte::page')

@section('title', 'Mostrar Usuario')

@section('content_header')
    <h1>{{ $usercia->name ?? 'Mostrar Usuario' }}</h1>
@stop

@section('content')
<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Mostrar Usuario</h3>
                    <a class="btn btn-default btn-sm float-right" href="{{ route('user.index') }}"> <i class="far fa-arrow-alt-circle-left"></i></a>
                </div>
                <!-- ./card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-hover">

                        <tbody>
                            <tr>
                                <td  width="9%"><small><strong>Usuario:</strong></small> </td>
                                <td><small>{{ $user->name }}</small></td>
                            </tr>

                            <tr>
                                <td  width="9%"><small><strong>Email:</strong></small> </td>
                                <td><small>{{ $user->email }}</small></td>
                            </tr>

                            <tr>
                                <td  width="9%"><small><strong>Codigo Postal:</strong></small> </td>
                                <td><small>{{ $user->direccion }}</small></td>
                            </tr>

                            <tr>
                                <td  width="9%"><small><strong>Dirección:</strong></small> </td>
                                <td><small>{{ $user->cp }}</small></td>
                            </tr>

                            <tr>
                                <td  width="9%"><small><strong>Empresa:</strong></small> </td>
                                <td><small>{{ $user->empresa_id }}</small></td>
                            </tr>

                            <tr>
                                <td  width="9%"><small><strong>Provincia:</strong></small> </td>
                                <td><small>{{ $user->provin_id }}</small></td>
                            </tr>

                            <tr>
                                <td  width="9%"><small><strong>Localidad:</strong></small> </td>
                                <td><small>{{ $user->localidad_id }}</small></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop

