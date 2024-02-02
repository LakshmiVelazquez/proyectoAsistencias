@extends('template.app')

@section('title','Información del Maestro: '.$maestro->nombre)

@section('menuCatalogos','active')
@section('menuLiMaestros','active')
@section('menuMaestros','toggled')

@section('menuCatalogos','active')
@section('menuLiMaestros','active')
@section('menuMaestros','toggled')

@section('script')
@endsection

@section('content')
    <div class="col-md-12">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-md-10">
                                <h4>Información del Maestro: {{ $maestro->nombre }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for=""> Nombre</label>
                                    {!! Form::text('nombre', $maestro->nombre, ['id'=>'nombre','class'=>'form-control','disabled']) !!}
                                </div>
                                <div class="col-md-6">
                                    <label for=""> Teléfono</label>
                                    {!! Form::text('telefono', $maestro->telefono, ['id'=>'telefono','class'=>'form-control','disabled']) !!}
                                </div>

                                <div class="col-md-12">
                                    <hr>
                                </div>
                                <div class="col-md-12">
                                    <h6>Datos de usuario:</h6>
                                </div>
                                <div class="col-md-12">
                                    <label for=""> Correo electronico</label>
                                    {!! Form::text('email', $maestro->user->email, ['id'=>'email','class'=>'form-control','disabled']) !!}
                                </div>

                                <div class="col-md-12">
                                    <hr>
                                </div>
                                <div class="col-md-12">
                                    <h6>Grupos que pertenecen a este maestro:</h6>
                                </div>
                                
                                @foreach($maestro->grupos as $grupo)
                                    <div class="col-md-12">
                                        <input checked disabled type="checkbox" /><label>{{ $grupo->grupo->nombre }}</label>
                                    </div>
                                @endforeach

                                <div class="col-md-12">
                                    <h6>Materias que impartira este maestro:</h6>
                                </div>

                                @foreach($maestro->materias as $materia)
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <input checked disabled type="checkbox" /><label>{{ $materia->materia->nombre }}</label>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="col-md-6 mt-5">
                                    <a href="{{ route('maestrosIndex') }}" class="btn btn-primary btn-lg btn-rounded">Volver</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection