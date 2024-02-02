@extends('template.app')

@section('title','Registrar Maestro')

@section('css')
    <link rel="stylesheet" href="{{ asset('bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('script')
    <script src="{{ asset('js/app/administrador/catalogos/maestros/maestros.js') }}"></script>
    <script>
        var urlMaterias = "{{ route('maestrosmaterias') }}";
    </script>
@endsection

@section('content')
    <div class="col-md-12">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-md-10">
                                <h4>Registrar Maestro</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            {!! Form::open(['route' => 'maestrosAgregar', "method" => "POST","id"=>"formulario"]) !!}
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for=""><span class="text-danger">*</span> Nombre</label>
                                        {!! Form::text('nombre', null, ['id'=>'nombre','class'=>'form-control']) !!}
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><span class="text-danger">*</span> Teléfono</label>
                                        {!! Form::text('telefono', null, ['id'=>'telefono','class'=>'form-control']) !!}
                                    </div>

                                    <div class="col-md-12">
                                        <hr>
                                    </div>
                                    <div class="col-md-12">
                                        <h6>Datos de usuario:</h6>
                                    </div>
                                    <div class="col-md-12">
                                        <label for=""><span class="text-danger">*</span> Correo electronico</label>
                                        {!! Form::text('email', null, ['id'=>'email','class'=>'form-control']) !!}
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><span class="text-danger">*</span> Nueva contraseña</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><span class="text-danger">*</span> Confirmar contraseña</label>
                                        <input type="password" class="form-control" id="password_c" name="password_c">
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
                                                <input onclick="addGrupo({{ $grupo->id }})" type="checkbox" /><label>{{ $grupo->nombre }}</label>
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

                                    
                                    {!! Form::hidden('grupos', null, ['id'=>'grupos']) !!}
                                    {!! Form::hidden('materias', null, ['id'=>'materias']) !!}


                                    <div class="col-md-6 mt-5">
                                        <a href="{{ route('materiasIndex') }}" class="btn btn-primary btn-lg btn-rounded">Volver</a>
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