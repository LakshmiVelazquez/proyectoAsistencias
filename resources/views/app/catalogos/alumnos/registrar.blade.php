@extends('template.app')

@section('title','Registrar Alumno')

@section('menuCatalogos','active')
@section('menuLiAlumnos','active')
@section('menuAlumnos','toggled')

@section('script')
    <script src="{{ asset('js/app/administrador/catalogos/alumnos/alumnos.js?v=1.0.1') }}"></script>
    <script>
        var urlGrupos = "{{ route('alumnosGrupos') }}";
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
                                <h4>Registrar Alumno</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            {!! Form::open(['route' => 'alumnosAgregar', "method" => "POST","id"=>"formulario"]) !!}
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for=""><span class="text-danger">*</span>Nombre</label>
                                        {!! Form::text('nombre', null, ['id'=>'nombre','class'=>'form-control']) !!}
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><span class="text-danger">*</span>Teléfono</label>
                                        {!! Form::number('telefono', null, ['id'=>'telefono','class'=>'form-control']) !!}
                                    </div>
                                    <div class="col-md-10">
                                        <label for=""><span class="text-danger">*</span>Matricula</label>
                                        {!! Form::text('matricula', null, ['id'=>'matricula','class'=>'form-control']) !!}
                                    </div>
                                    <div class="col-md-2">
                                        <label for="">Nivel del alumno (grado)</label>
                                        <select onchange="gruposFind()" name="nivel" id="nivel" class="form-control">
                                            <option value="-1">Seleccione un nivel</option>
                                            @for($i = 1; $i < 9; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>

                                    <div class="col-md-12 mt-4">
                                        <h6>
                                            Datos del padre de familia: 
                                            <a style="cursor: pointer; color: blue;" onclick="addDatos()">¿El padre ya ha sido anteriormente registrado? Click aquí.</a>
                                        </h6>
                                    </div>
                                    <div class="col-md-4">
                                        <label for=""><span class="text-danger">*</span>Nombre</label>
                                        {!! Form::text('nombre_padre', null, ['id'=>'nombre_padre','class'=>'form-control']) !!}
                                    </div>
                                    <div class="col-md-4">
                                        <label for=""><span class="text-danger">*</span>Dirección</label>
                                        {!! Form::text('direccion', null, ['id'=>'direccion','class'=>'form-control']) !!}
                                    </div>
                                    <div class="col-md-4">
                                        <label for=""><span class="text-danger">*</span>Telefono</label>
                                        {!! Form::text('telefono_padre', null, ['id'=>'telefono_padre','class'=>'form-control']) !!}
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><span class="text-danger">*</span>Correo electronico</label>
                                        {!! Form::text('email', null, ['id'=>'email','class'=>'form-control']) !!}
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><span class="text-danger">*</span>Nueva contraseña</label>
                                        <input type="password" name="password" id="password" class="form-control">
                                    </div>

                                    <div class="col-md-12 mt-4">
                                        <hr>
                                        <h6>Selecciona el grupo al que pertenecera este alumno:</h6>
                                    </div>
                                    
                                    <div class="col-md-12" id="gruposShow">
                                        <span class="text-danger ml-4">Seleccione el nivel</span>
                                    </div>

                                    {!! Form::hidden('grupos', null, ['id'=>'grupos']) !!}

                                    <div class="col-md-6 mt-5">
                                        <a href="{{ route('alumnosIndex') }}" class="btn btn-primary btn-lg btn-rounded">Volver</a>
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

@section('modals')
    <div class="modal fade" tabindex="-1" role="dialog" id="modalPadres">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Selecciona al padre de familia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Padres de familia</label>
                            <select name="padre_id" id="padre_id" class="form-control">
                                <option value="-1">Selecciona un padre de familia</option>
                                @foreach($padres as $padre)
                                    <option value="{{ $padre->id }}">{{ $padre->nombre }} --- {{ $padre->user->email }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="seleccionar();">Seleccionar</button>
                </div>
            </div>
        </div>
    </div>
@endsection