@extends('template.app')

@section('title','Información del usuario: '.$usuario->name)

@section('menuCatalogos','active')
@section('menuLiUsuarios','active')
@section('menuUsuarios','toggled')

@section('content')
    <div class="col-md-12">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-md-10">
                                <h4>Información del usuario: {{ $usuario->email }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for=""><span class="text-danger">*</span> Nombre</label>
                                    {!! Form::text('nombre', $usuario->name, ['id'=>'nombre','class'=>'form-control','disabled']) !!}
                                </div>
                                <div class="col-md-6">
                                    <label for=""><span class="text-danger">*</span> Correo electronico</label>
                                    {!! Form::text('email', $usuario->email, ['id'=>'email','class'=>'form-control','disabled']) !!}
                                </div>

                                <div class="col-md-6 mt-5">
                                    <a href="{{ route('usuariosIndex') }}" class="btn btn-primary btn-lg btn-rounded">Volver</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection