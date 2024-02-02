@extends('template.app')

@section('title','Maestros')

@section('menuCatalogos','active')
@section('menuLiMaestros','active')
@section('menuMaestros','toggled')

@section('css')
    <link rel="stylesheet" href="{{ asset('bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('script')
    <script src="{{ asset('bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/page/datatables.js') }}"></script>
@endsection

@section('content')
    <div class="col-md-12">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-md-10">
                                <h4>Maestros</h4>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('maestrosRegistrar') }}" class="btn btn-success btn-sm btn-rounded float-right"><i class="fas fa-plus"></i> Registrar</a>
                                <br>
                                <a href="{{ route('maestrosgenerateExcelmaestros') }}" class="btn btn-success btn-lg btn-rounded float-right text-white mt-3" target="_blank"> <i class="fas fa-file-excel"></i> Exportar a Excel</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th width="10%" class="text-center">#</th>
                                            <th>Nombre</th>
                                            <th>Teléfono</th>
                                            <th>Usuario</th>
                                            <th width="10%">Grupos</th>
                                            <th width="10%">Materias</th>
                                            <th width="10%">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($maestros as $key => $maestro)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $maestro->nombre }}</td>
                                                <td>
                                                    {{ $maestro->telefono }}
                                                </td>
                                                <td>
                                                    {{ $maestro->user->email }}
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('maestrosGrupos',$maestro->id) }}">
                                                        <i class="fas fa-user"></i>
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('maestrosmateriasMaestro',$maestro->id) }}">
                                                        <i class="fas fa-book"></i>
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('maestrosInformacion',$maestro->id) }}" class="text h2">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('maestrosEditar',$maestro->id) }}" class="text-success h2">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="{{ route('maestrosEliminar',$maestro->id) }}" class="text-danger h2">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection