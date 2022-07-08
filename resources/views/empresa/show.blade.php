@extends('adminlte::page')

@section('title', 'Dashboard | Mostrar Pais')

@section('content_header')
    <h1>{{ $empresa->name ?? 'Mostrar Pais' }}</h1>
@stop

@section('content')
<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Mostrar Pais</h3>
                    <a class="btn btn-default btn-sm float-right" href="{{ route('empresa.index') }}"> <i class="far fa-arrow-alt-circle-left"></i></a>
                </div>
                <!-- ./card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-hover">

                        <tbody>
                            <tr>
                                <td  width="9%"><small><strong>Nombre Empresa:</strong></small> </td>
                                <td><small>{{ $empresa->nombre }}</small> </td>
                            </tr>
                            <tr>
                                <td  width="9%"><small><strong>CIF:</strong></small> </td>
                                <td><small>{{ $empresa->Nif }}</small> </td>
                            </tr>
                            <tr>
                                <td  width="9%"><small><strong>Dirección:</strong></small> </td>
                                <td><small>{{ $empresa->Direccion }}</small> </td>
                            </tr>
                            <tr>
                                <td  width="9%"><small><strong>Localidad:</strong></small> </td>
                                <td><small>{{ $empresa->localidad->nombre }}</small> </td>
                            </tr>
                            <tr>
                                <td  width="9%"><small><strong>Provincia:</strong></small> </td>
                                <td><small>{{ $empresa->provin->nombre }}</small> </td>
                            </tr>
                            <tr>
                                <td  width="9%"><small><strong>Codigo Postal:</strong></small> </td>
                                <td><small>{{ $empresa->Cp }}</small> </td>
                            </tr>
                            <tr>
                                <td  width="9%"><small><strong>Telefono:</strong></small> </td>
                                <td><small>{{ $empresa->Telefono }}</small> </td>
                            </tr>
                            <tr>
                                <td  width="9%"><small><strong>Email:</strong></small> </td>
                                <td><small>{{ $empresa->Email }}</small> </td>
                            </tr>
                            <tr>
                                <td  width="9%"><small><strong>Pais:</strong></small> </td>
                                <td><small>{{ $empresa->territorio->nombre }}</small> </td>
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

