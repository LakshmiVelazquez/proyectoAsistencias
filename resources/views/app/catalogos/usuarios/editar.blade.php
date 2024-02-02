@extends('template.app')

@section('title','Editar usuario: '.$usuario->name)

@section('menuCatalogos','active')
@section('menuLiUsuarios','active')
@section('menuUsuarios','toggled')

@section('script')
    <script src="{{ asset('js/app/administrador/catalogos/usuarios/usuarios_editar.js') }}"></script>
@endsection

@section('content')
    <div class="col-md-12">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-md-10">
                                <h4>Editar usuario: {{ $usuario->email }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            {!! Form::open(['route' => 'usuariosActualizar', "method" => "POST","id"=>"formulario"]) !!}
                                <div class="row">
                                    {!! Form::hidden('id', $usuario->id) !!}
                                    <div class="col-md-6">
                                        <label for=""><span class="text-danger">*</span> Nombre</label>
                                        {!! Form::text('nombre', $usuario->name, ['id'=>'nombre','class'=>'form-control']) !!}
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><span class="text-danger">*</span> Correo electronico</label>
                                        {!! Form::text('email', $usuario->email, ['id'=>'email','class'=>'form-control']) !!}
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""> Nueva contraseña</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""> Confirmar contraseña</label>
                                        <input type="password" class="form-control" id="password_c" name="password_c">
                                    </div>

                                    <div class="col-md-6 mt-5">
                                        <a href="{{ route('usuariosIndex') }}" class="btn btn-primary btn-lg btn-rounded">Volver</a>
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