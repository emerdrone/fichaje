@extends('adminlte::page')

@section('title', 'Mostrar Pais')

@section('content_header')
    <h1>{{ $territorio->name ?? 'Mostrar Pais' }}</h1>
@stop

@section('content')
<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Mostrar Pais</h3>
                    <a class="btn btn-default btn-sm float-right" href="{{ route('territorio.index') }}"> <i class="far fa-arrow-alt-circle-left"></i></a>
                </div>
                <!-- ./card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-hover">

                        <tbody>
                            <tr>
                                <td  width="9%"><small><strong>Nombre del pais:</strong></small> </td>
                                <td>{{ $territorio->nombre }}</td>
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

