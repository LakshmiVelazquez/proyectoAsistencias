@extends('template.app')

@section('title','Alumnos del Grupo: '. $grupo->nombre)

@section('menuCatalogos','active')
@section('menuLiGrupos','active')
@section('menuGrupos','toggled')

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
                                <h4>Alumnos del Grupo: {{ $grupo->nombre }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th width="10%" class="text-center">#</th>
                                            <th>Nombre</th>
                                            <th width="10%">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($grupo->alumnos)>0)
                                            @foreach($grupo->alumnos as $key => $alumno)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $alumno->alumno->nombre }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('alumnosInformacion',$alumno->alumno->id) }}" class="text h2">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td class="text-center" colspan="4">
                                                    Sin datos
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="col-md-6 mt-5">
                                <a href="{{ route('gruposIndex') }}" class="btn btn-primary btn-lg btn-rounded">Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection