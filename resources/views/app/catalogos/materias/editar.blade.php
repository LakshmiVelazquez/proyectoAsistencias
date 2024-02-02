@extends('template.app')

@section('title','Editar Materia: '.$materia->nombre)

@section('menuCatalogos','active')
@section('menuLiMaterias','active')
@section('menuMaterias','toggled')

@section('script')
    <script src="{{ asset('js/app/administrador/catalogos/materias.js') }}"></script>
@endsection

@section('content')
    <div class="col-md-12">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-md-10">
                                <h4>Editar Materia: {{ $materia->nombre }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            {!! Form::open(['route' => 'materiasActualizar', "method" => "POST","id"=>"formulario"]) !!}
                                <div class="row">
                                    {!! Form::hidden('id', $materia->id) !!}
                                    <div class="col-md-6">
                                        <label for=""><span class="text-danger">*</span> Nombre</label>
                                        {!! Form::text('nombre', $materia->nombre, ['id'=>'nombre','class'=>'form-control']) !!}
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><span class="text-danger">*</span> Grado</label>
                                        <select name="grado" id="grado" class="form-control">
                                            <option value="-1">Selecciona un grado</option>
                                            @for($i = 1; $i < 9; $i++)
                                                <option @if($i == $materia->grado) selected @endif value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-6 mt-5">
                                        <a href="{{ route('materiasIndex') }}" class="btn btn-primary btn-lg btn-rounded">Volver</a>
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