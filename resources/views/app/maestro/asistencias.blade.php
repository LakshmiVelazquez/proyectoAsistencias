@extends('template.app')

@section('title','Asistencias')

@section('menuAsistencias','active')

@section('css')
    <link rel="stylesheet" href="{{ asset('bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('script')
    <script src="{{ asset('bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/page/datatables.js') }}"></script>
    <script src="{{ asset('js/app/maestro/asistencias.js') }}"></script>
@endsection

@section('content')
    <div class="col-md-12">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-md-10">
                                <h4>Asistencias</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Fecha</label>
                                    {!! Form::date('fecha', date('Y-m-d'), ['id'=>'fecha','class'=>'form-control']) !!}
                                </div>
                                <div class="col-md-3">
                                    <label for="">Grupo</label>
                                    <select name="grupo" id="grupo" class="form-control">
                                        @foreach($maestro->grupos as $grupo)
                                            <option value="{{ $grupo->grupo->id }}">{{ $grupo->grupo->nombre }} | {{ $grupo->grupo->grado }}.{{ $grupo->grupo->grupo }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 d-flex justify-content-end">
                                    <label for=""></label>
                                    <button type="button" onclick="buscarAsistencias()" class="btn btn-primary btn-lg btn-rounded float-right text-white mt-3"><i class="fas fa-search"></i> Buscar</button>
                                </div>

                                <div class="col-md-12 mt-5" id="asistenciasTable">
                                    <label for="">Seleccione una fecha para mostrar las asistencias.</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection