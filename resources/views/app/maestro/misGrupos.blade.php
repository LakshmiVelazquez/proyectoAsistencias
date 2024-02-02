@extends('template.app')

@section('title','Grupos')

@section('menuGrupo','active')

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
                                <h4>Mis Grupos</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th width="10%" class="text-center">#</th>
                                            <th>Nombre</th>
                                            <th width="10%" class="text-center">Grado</th>
                                            <th width="10%" class="text-center">Grupo</th>
                                            <th class="text-center">Materias</th>
                                            <th width="10%"  class="text-center">Alumnos</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($maestro->grupos as $key => $grupo)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $grupo->grupo->nombre }}</td>
                                                <td class="text-center">{{ $grupo->grupo->grado }}</td>
                                                <td class="text-center">
                                                    {{ $grupo->grupo->grupo }}
                                                </td>
                                                <td class="text-center">
                                                    @if(count($grupo->grupo->materias)>0)
                                                        @foreach($grupo->grupo->materias as $materia)
                                                            <li>{{ $materia->materia->nombre }} {{ $materia->materia->grado }}</li>
                                                        @endforeach
                                                    @else
                                                        <span class="text-danger">Sin materias asignadas</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('misAlumnosIndex',$grupo->grupo->id) }}" class="text h2">
                                                        <i class="fas fa-user"></i>
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