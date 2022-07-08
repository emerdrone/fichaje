@extends('adminlte::page')

@section('title', 'Crear Pais')

@section('content_header')
    <h1>Crear Pais</h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">
                            <button type="button" class="btn btn-default btn-sm" data-toggle="modal"
                                data-target="#modal-default">
                                <i class="fas fa-upload"></i>
                            </button>
                            <a class="btn btn-default btn-sm" href="{{ route('territorio.restaurar') }}"><i class="fas fa-cog"></i></a>
                        </span>
                        <a class="btn btn-default btn-sm float-right" href="{{ route('territorio.index') }}"> <i class="far fa-arrow-alt-circle-left"></i></a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('territorio.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('territorio.form')

                            <div class="box-footer mt20">
                                <button type="submit" class="btn btn-primary btn-sm float-right"><i class="fas fa-plus-circle mr-1"></i>Crear Provincia</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Importar Provinciaes</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('territorio.excel') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (Session::has('message'))
                            <p>{{ Session::get('message') }}</p>
                        @endif


                        <div class="form-group">
                            <label for="exampleInputFile">Subir Archivo</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="file">
                                    <label class="custom-file-label" for="exampleInputFile">Elija el archivo</label>
                                </div>
                                <div class="input-group-append">

                                    <button type="submit" class="btn btn-block btn-secondary btn-sm">Subir
                                        Provinciaes</button>

                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="modal-footer justify-content-between">
                    <a href="{{ asset('archivos/paises.xlsx') }}" class="btn btn-default btn-sm float-left"><i class="fas fa-file-download"></i></a>
                    <button type="button" class="btn btn-primary btn-sm float-right" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="{{ asset('js/bs-custom-file-input.min.js') }}"></script>

    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@stop
