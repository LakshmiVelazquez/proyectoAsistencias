@extends('template.app')

@section('title','Información del Alumno: '.$alumno->nombre)

@section('menuCatalogos','active')
@section('menuLiAlumnos','active')
@section('menuAlumnos','toggled')

@section('content')
    <div class="col-md-12">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-md-10">
                                <h4>Información del Alumno: {{ $alumno->nombre }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Nombre</label>
                                    {!! Form::text('nombre', $alumno->nombre, ['id'=>'nombre','class'=>'form-control','disabled']) !!}
                                </div>
                                <div class="col-md-6">
                                    <label for="">Teléfono</label>
                                    {!! Form::number('telefono', $alumno->telefono, ['id'=>'telefono','class'=>'form-control','disabled']) !!}
                                </div>
                                <div class="col-md-12">
                                    <label for="">Matricula</label>
                                    {!! Form::text('matricula', $alumno->matricula, ['id'=>'matricula','class'=>'form-control','disabled']) !!}
                                </div>

                                <div class="col-md-12 mt-4">
                                    <h6>
                                        Datos del padre de familia: 
                                    </h6>
                                </div>
                                <div class="col-md-4">
                                    <label for=""><span class="text-danger">*</span>Nombre</label>
                                    {!! Form::text('nombre_padre', $alumno->padre->padre->nombre, ['id'=>'nombre_padre','class'=>'form-control','disabled']) !!}
                                </div>
                                <div class="col-md-4">
                                    <label for=""><span class="text-danger">*</span>Dirección</label>
                                    {!! Form::text('direccion', $alumno->padre->padre->direccion, ['id'=>'direccion','class'=>'form-control','disabled']) !!}
                                </div>
                                <div class="col-md-4">
                                    <label for=""><span class="text-danger">*</span>Telefono</label>
                                    {!! Form::text('telefono_padre', $alumno->padre->padre->telefono, ['id'=>'telefono_padre','class'=>'form-control','disabled']) !!}
                                </div>
                                <div class="col-md-12">
                                    <label for=""><span class="text-danger">*</span>Correo electronico</label>
                                    {!! Form::text('email', $alumno->padre->padre->user->email, ['id'=>'email','class'=>'form-control','disabled']) !!}
                                </div>

                                <div class="col-md-12 mt-4">
                                    <hr>
                                    <h6>Grupos al que pertenece este alumno:</h6>
                                </div>
                                
                                <div class="col-md-12" id="gruposShow">
                                    @foreach($alumno->grupos as $grupo)
                                        <div class="col-md-12">
                                            <input disabled checked id="grupo_{{ $grupo->grupo_id }}" onclick="addGrupo({{ $grupo->grupo_id }})" type="checkbox" />
                                            <label>{{ $grupo->grupo->nombre }}</label>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="col-md-6 mt-5">
                                    <a href="{{ route('alumnosIndex') }}" class="btn btn-primary btn-lg btn-rounded">Volver</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection