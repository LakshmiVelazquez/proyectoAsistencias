@extends('template.app')

@section('title','Grupos del maestro: '.$maestro->nombre)

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
                                <h4>Grupos del maestro: {{ $maestro->nombre }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th width="10%" class="text-center">#</th>
                                            <th width="20%">Grupo y Grado</th>
                                            <th>Nombre</th>
                                            <th width="10%">Alumnos</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($maestro->grupos as $key => $grupo)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>
                                                    {{ $grupo->grupo->grado }} {{ $grupo->grupo->grupo }}
                                                </td>
                                                <td>{{ $grupo->grupo->nombre }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('gruposAlumnos',$grupo->grupo_id) }}" class="text h2">
                                                        <i class="fas fa-user"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="col-md-6 mt-5">
                                <a href="{{ route('maestrosIndex') }}" class="btn btn-primary btn-lg btn-rounded">Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection