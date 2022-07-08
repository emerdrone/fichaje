@extends('adminlte::page')

@section('title', 'Actualizar Pais')

@section('content_header')
    <h1>Actualizar Pais</h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Pais</span>
                        <a class="btn btn-default btn-sm float-right" href="{{ route('territorio.index') }}"> <i class="far fa-arrow-alt-circle-left"></i></a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('territorio.update', $territorio->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('territorio.form')

                            <div class="card-footer col-md-12">
                                <button type="submit" class="btn btn-primary btn-sm float-right"><i class="fas fa-check-circle mr-1"></i>Actualizar Pais</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
