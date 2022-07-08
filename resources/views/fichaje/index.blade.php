@extends('layouts.app')

@section('template_title')
    Fichaje
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Fichaje') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('fichajes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Horainicio</th>
										<th>Horafin</th>
										<th>Estadofichaje</th>
										<th>Geolatini</th>
										<th>Geolonini</th>
										<th>User Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fichajes as $fichaje)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $fichaje->horainicio }}</td>
											<td>{{ $fichaje->horafin }}</td>
											<td>{{ $fichaje->estadofichaje }}</td>
											<td>{{ $fichaje->geolatini }}</td>
											<td>{{ $fichaje->geolonini }}</td>
											<td>{{ $fichaje->user_id }}</td>

                                            <td>
                                                <form action="{{ route('fichajes.destroy',$fichaje->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('fichajes.show',$fichaje->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('fichajes.edit',$fichaje->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $fichajes->links() !!}
            </div>
        </div>
    </div>
@endsection
