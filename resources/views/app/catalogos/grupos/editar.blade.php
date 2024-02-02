@extends('template.app')

@section('title','Actualizar Grupo: '. $grupo->grado. '.-' .$grupo->grupo)

@section('menuCatalogos','active')
@section('menuLiGrupos','active')
@section('menuGrupos','toggled')

@section('script')
    <script>
        var urlMaterias = "{{ route('gruposMaterias') }}";
    </script>
    <script src="{{ asset('js/app/administrador/catalogos/grupos/grupos_editar.js') }}"></script>
@endsection

@section('content')
    <div class="col-md-12">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-md-10">
                                <h4>Actualizar Grupo: {{ $grupo->grado }}.-{{ $grupo->grupo }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            {!! Form::open(['route' => 'gruposActualizar', "method" => "POST","id"=>"formulario"]) !!}
                                <div class="row">
                                    {!! Form::hidden('id', $grupo->id) !!}
                                    <div class="col-md-12">
                                        <label for=""><span class="text-danger">*</span> Nombre</label>
                                        {!! Form::text('nombre', $grupo->nombre,["id"=>"nombre","class"=>"form-control"]) !!}
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><span class="text-danger">*</span> Grado</label>
                                        <select name="grado" id="grado" class="form-control">
                                            <option value="-1">Selecciona un grado</option>
                                            @for($i = 1; $i < 9; $i++)
                                                <option @if($grupo->grado == $i) selected @endif value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><span class="text-danger">*</span> Grupo</label>
                                        <select name="grupo" id="grupo" class="form-control">
                                            <option value="-1">Selecciona un grupo</option>
                                            <option @if($grupo->grupo == "A") selected @endif value="A">A</option>
                                            <option @if($grupo->grupo == "B") selected @endif value="B">B</option>
                                            <option @if($grupo->grupo == "C") selected @endif value="C">C</option>
                                            <option @if($grupo->grupo == "D") selected @endif value="D">D</option>
                                            <option @if($grupo->grupo == "E") selected @endif value="E">E</option>
                                            <option @if($grupo->grupo == "F") selected @endif value="F">F</option>
                                            <option @if($grupo->grupo == "G") selected @endif value="G">G</option>
                                            <option @if($grupo->grupo == "H") selected @endif value="H">H</option>
                                            <option @if($grupo->grupo == "I") selected @endif value="I">I</option>
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
                                    
                                    {!! Form::hidden('materias', $grupo->materias, ['id'=>'materias']) !!}

                                    <div class="col-md-6 mt-5">
                                        <a href="{{ route('gruposIndex') }}" class="btn btn-primary btn-lg btn-rounded">Volver</a>
                                    </div>
                                    <div class="col-md-6 mt-5">
                                        <button type="button" class="btn btn-success btn-lg btn-rounded float-right" onclick="actualizar(this)">Actualizar</button>
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