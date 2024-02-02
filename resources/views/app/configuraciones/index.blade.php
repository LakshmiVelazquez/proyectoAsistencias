@extends('template.app')

@section('title','Configuración')

@section('menuConfiguraciones','active')

@section('script')
    <script src="{{ asset('js/app/administrador/configuraciones/configuraciones.js') }}"></script>
@endsection

@section('content')
    <div class="col-md-12">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-md-10">
                                <h4>Configuración</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            {!! Form::open(['route' => 'appConfiguracionesActualizar', "method" => "POST","id"=>"formulario","files"=>"true"]) !!}
                                <div class="row">
                                    {!! Form::hidden('id',$user->id) !!}
                                    <div class="col-md-6">
                                        <label for=""><span class="text-danger">*</span> Nombre de usuario</label>
                                        {!! Form::text('user', $user->name, ['id'=>'user','class'=>'form-control']) !!}
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><span class="text-danger">*</span> Correo electronico</label>
                                        {!! Form::text('email', $user->email, ['id'=>'email','class'=>'form-control']) !!}
                                    </div>

                                    <div class="col-md-12 mt-2">
                                        <label for="">Foto de perfil</label><br>
                                        {!! Form::file('imagen', null,['id'=>'imagen','class'=>'form-control']) !!}
                                    </div>

                                    <div class="col-md-12">
                                        <hr>
                                        <h6>Actualizar contraseña</h6>
                                    </div>
                                    <div class="col-md-6 mt-5">
                                        <label for=""> Actualizar contraseña</label>
                                        <input type="password" id="password" name="password" class="form-control">
                                    </div>
                                    <div class="col-md-6 mt-5">
                                        <label for=""> Confirmar contraseña</label>
                                        <input type="password" id="password_c" name="password_c" class="form-control">
                                    </div>
                                    <div class="col-md-6 mt-5 offset-md-6">
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