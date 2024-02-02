<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <title>Registrar asistencia</title>
        <link rel="stylesheet" href="{{ asset('css/app.min.css') }}">
        <link rel="stylesheet" href="{{ asset('bundles/bootstrap-social/bootstrap-social.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/components.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        <link rel='shortcut icon' type='image/x-icon' href='{{ asset('img/favicon.ico') }}' />
        <link rel="stylesheet" href="{{ asset('css/sweetalert.min.css') }}"> 
        <script src="{{ asset('js/sweetalert.min.js') }}"></script> 
    </head>

    <body>
        @include('sweet::alert')
        <div class="loader"></div>
        <div id="app">
            <section class="section">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                            <div class="card card-primary">
                                <div class="card-header row mt-1">
                                    <div class="col-md-12 text-center">
                                        <img style="width: 90%;" src="{{ asset('images/logo.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="card-body">
                                    {!! Form::open(['route' => 'publicSaveAsistencia', "method" => "POST","class"=>"needs-validation","id"=>"formulario"]) !!}
                                        <div class="form-group">
                                            <label for="email">Matricula del alumno</label>
                                            <input id="matricula" type="text" class="form-control" name="matricula" tabindex="1">
                                        </div>
                                        <div class="form-group">
                                            <button type="button" onclick="registrar(this);" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                                Registrar
                                            </button>
                                            <a href="{{ route('login') }}" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                                Iniciar Sesión
                                            </a>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <script src="{{ asset('js/app.min.js') }}"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
        <script>
            function registrar(btn){
                btn.disabled = true;
                document.getElementById("formulario").submit();
            }
        </script>
    </body>
</html>