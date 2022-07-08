@extends('layouts.app')

@section('template_title')
    {{ $fichaje->name ?? 'Show Fichaje' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Fichaje</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('fichajes.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Horainicio:</strong>
                            {{ $fichaje->horainicio }}
                        </div>
                        <div class="form-group">
                            <strong>Horafin:</strong>
                            {{ $fichaje->horafin }}
                        </div>
                        <div class="form-group">
                            <strong>Estadofichaje:</strong>
                            {{ $fichaje->estadofichaje }}
                        </div>
                        <div class="form-group">
                            <strong>Geolatini:</strong>
                            {{ $fichaje->geolatini }}
                        </div>
                        <div class="form-group">
                            <strong>Geolonini:</strong>
                            {{ $fichaje->geolonini }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $fichaje->user_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
