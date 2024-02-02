@extends('template.app')

@section('title','Registrar Grupo')

@section('css')
    <link rel="stylesheet" href="{{ asset('bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('script')
    <script src="{{ asset('js/app/administrador/catalogos/grupos/grupos.js') }}"></script>
    <script>
        var urlMaterias = "{{ route('gruposMaterias') }}";
    </script>
@endsection

@section('content')
    <div class="col-md-12">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Registrar Grupo</h4>
                        </div>
                        <div class="card-body">
                            {!! Form::open(['route' => 'gruposAgregar', "method" => "POST","id"=>"formulario"]) !!}
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for=""><span class="text-danger">*</span> Nombre</label>
                                        {!! Form::text('nombre', null,["id"=>"nombre","class"=>"form-control"]) !!}
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><span class="text-danger">*</span> Grado</label>
                                        <select onchange="materiasFind()" name="grado" id="grado" class="form-control">
                                            <option value="-1">Selecciona un grado</option>
                                            @for($i = 1; $i < 9; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><span class="text-danger">*</span> Grupo</label>
                                        <select name="grupo" id="grupo" class="form-control">
                                            <option value="-1">Selecciona un grupo</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                            <option value="E">E</option>
                                            <option value="F">F</option>
                                            <option value="G">G</option>
                                            <option value="H">H</option>
                                            <option value="I">I</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12">
                                        <hr>
                                    </div>
                                    <div class="col-md-12">
                                        <h6>Selecciona las materias que pertenecen a este grupo:</h6>
                                    </div>

                                    <div class="col-md-12" id="materiasShow">
                                        <p class="ml-3 text-danger">Selecciona un grado para mostrar materias.</p>
                                    </div>
                                    
                                    {!! Form::hidden('materias', null, ['id'=>'materias']) !!}

                                    <div class="col-md-6 mt-5">
                                        <a href="{{ route('gruposIndex') }}" class="btn btn-primary btn-lg btn-rounded">Volver</a>
                                    </div>
                                    <div class="col-md-6 mt-5">
                                        <button type="button" class="btn btn-success btn-lg btn-rounded float-right" onclick="registrar(this)">Registrar</button>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection