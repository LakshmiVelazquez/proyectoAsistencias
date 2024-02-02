@extends('template.app')

@section('title','Editar Maestro: '.$maestro->nombre)

@section('menuCatalogos','active')
@section('menuLiMaestros','active')
@section('menuMaestros','toggled')

@section('script')
    <script>
        var urlMaterias = "{{ route('maestrosmaterias') }}";
    </script>
    <script src="{{ asset('js/app/administrador/catalogos/maestros/maestros_editar.js') }}"></script>
@endsection

@section('content')
    <div class="col-md-12">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-md-10">
                                <h4>Editar Maestro: {{ $maestro->nombre }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            {!! Form::open(['route' => 'maestrosActualizar', "method" => "POST","id"=>"formulario"]) !!}
                                <div class="row">
                                    {!! Form::hidden('id', $maestro->id, ['id'=>'id']) !!}
                                    <div class="col-md-6">
                                        <label for=""><span class="text-danger">*</span> Nombre</label>
                                        {!! Form::text('nombre', $maestro->nombre, ['id'=>'nombre','class'=>'form-control']) !!}
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><span class="text-danger">*</span> Teléfono</label>
                                        {!! Form::text('telefono', $maestro->telefono, ['id'=>'telefono','class'=>'form-control']) !!}
                                    </div>

                                    <div class="col-md-12">
                                        <hr>
                                    </div>
                                    <div class="col-md-12">
                                        <h6>Selecciona los grupos que pertenecen a este maestro:</h6>
                                    </div>

                                    @if(count($grupos)>0)
                                        @foreach($grupos as $grupo)
                                            <div class="col-md-12">
                                                <input id="grupo_{{ $grupo->id }}" onclick="addGrupo({{ $grupo->id }})" type="checkbox" /><label>{{ $grupo->nombre }}</label>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="col-md-12">
                                            <a href="{{ route('gruposIndex') }}">Registrar grupos.</a>
                                        </div>
                                    @endif

                                    <div class="col-md-12">
                                        <h6>Selecciona las materias que impartira este maestro:</h6>
                                    </div>

                                    <div class="col-md-12" id="materiasShow">
                                        <p class="ml-3 text-danger">Selecciona algún grupo para mostrar materias.</p>
                                    </div>

                                    
                                    {!! Form::hidden('grupos', $maestro->grupos, ['id'=>'grupos']) !!}
                                    {!! Form::hidden('materias', $maestro->materias, ['id'=>'materias']) !!}


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