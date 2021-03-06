@extends('adminlte::page')

@section('title', 'Localidad')

@section('content_header')
    <h1>Localidad</h1>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">

    <script src="{{ asset('toastr/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}">
    <script src="{{ asset('toastr/toastr.min.js') }}"></script>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Localidad') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('localidad.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    <i class="fas fa-plus-circle"></i>
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
                            <table class="table table-striped table-hover" id="tabla">
                                <thead class="thead">
                                    <tr>
                                        <th width="3%"><small>N??</small> </th>

                                        <th><small>Localidad</small> </th>
                                        <th><small>Provincia</small> </th>
                                        <td width="8%" class="text-center">
                                    </tr>
                                </thead>
                                {{-- <tbody>
                                    @foreach ($localidads as $localidad)
                                        <tr>
                                            <td><small>{{ $localidad->id }}</small></td>

											<td><small>{{ $localidad->nombre }}</small></td>
                                            <td><small>{{ $localidad->provin->nombre }}</small></td>
                                            <td width="15%" class="text-center">
                                                <form action="{{ route('localidad.destroy',$localidad->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('localidad.show',$localidad->id) }}"><i class="fa fa-fw fa-eye"></i> </a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('localidad.edit',$localidad->id) }}"><i class="fa fa-fw fa-edit"></i> </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Est??s seguro que deseas eliminar el registro?');" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody> --}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@stop

@section('js')
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('js/bs-custom-file-input.min.js') }}"></script>
    <script>
        $('#tabla').DataTable({
            responsive: true,
            autoWidth: false,

            "ajax": "{{ route('localidadsdata') }}",
            "columns": [{
                    data: 'id'
                },
                {
                    data: 'nombre'
                },
                {
                    data: 'provin_id',
                },
                {
                    data: 'btn'
                },
            ],

            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por paginas",
                "zeroRecords": "Nada encontrado - disculpe",
                "info": "Mostrando p??gina _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                "search": "Buscar",
                "paginate": {
                    'next': 'Siguiente',
                    'previous': 'Anterior'
                }

            }
        });
    </script>

    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>

    <script>
        @if (Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('message') }}");
        @endif

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>
@stop
