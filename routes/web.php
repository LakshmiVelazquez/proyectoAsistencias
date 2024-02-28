<?php

use Illuminate\Support\Facades\Route;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

Route::get('/generate-qr', function () {
    // Generar el código QR
    $qrCode = QrCode::size(300)->generate('Contenido del Código QR');

    // Retornar la vista con el código QR
    return view('qr_generator', compact('qrCode'));
});


Route::get('/', [
    'uses' => 'App\Http\Controllers\Auth\LoginController@loginView',
    'as' => 'login'
]);

Route::post('postLogin', [
    'uses' => 'App\Http\Controllers\Auth\LoginController@postlogin',
    'as' => 'postlogin'
]);

Route::get('logout', [
    'uses' => 'App\Http\Controllers\Auth\LoginController@logout',
    'as' => 'logout'
]);

Route::get('/asistencia', [
    'uses' => 'App\Http\Controllers\AsistenciaController@asistencia',
    'as' => 'publicAsistencia'
]);
Route::post('/saveAsistencia', [
    'uses' => 'App\Http\Controllers\AsistenciaController@saveAsistencia',
    'as' => 'publicSaveAsistencia'
]);

Route::get('/generateExcelMaterias', [
    'uses' => 'App\Http\Controllers\Administrador\Catalogos\MateriasController@generateExcelMaterias',
    'as' => 'materiasgenerateExcelMaterias'
]);
Route::get('/generateExcelgrupos', [
    'uses' => 'App\Http\Controllers\Administrador\Catalogos\GruposController@generateExcelgrupos',
    'as' => 'gruposgenerateExcelgrupos'
]);
Route::get('/generateExcelalumnos', [
    'uses' => 'App\Http\Controllers\Administrador\Catalogos\AlumnosController@generateExcelAlumnos',
    'as' => 'alumnosgenerateExcelalumnos'
]);
Route::get('/generateExcelmaestros', [
    'uses' => 'App\Http\Controllers\Administrador\Catalogos\MaestrosController@generateExcelMaestros',
    'as' => 'maestrosgenerateExcelmaestros'
]);
Route::get('/generateExcelusuarios', [
    'uses' => 'App\Http\Controllers\Administrador\Catalogos\UsuariosController@generateExcelusuarios',
    'as' => 'usuariosgenerateExcelusuarios'
]);
Route::get('/generateExcelasistencias', [
    'uses' => 'App\Http\Controllers\AsistenciasController@generateExcelAsistencias',
    'as' => 'asistenciasgenerateExcelasistencias'
]);

Route::group(["prefix" => "/app", 'middleware' => ['auth', 'revalidate']], function () {
    Route::get('/', [
        'uses' => 'App\Http\Controllers\AppController@index',
        'as' => 'appIndex'
    ]);


    Route::group(["prefix" => "/catalogos", 'middleware' => ['auth', 'revalidate']], function () {
        Route::group(["prefix" => "/materias", 'middleware' => ['auth', 'revalidate']], function () {
            Route::get('/', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\MateriasController@index',
                'as' => 'materiasIndex'
            ]);
            Route::get('/registrar', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\MateriasController@registrar',
                'as' => 'materiasRegistrar'
            ]);
            Route::post('/agregar', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\MateriasController@agregar',
                'as' => 'materiasAgregar'
            ]);
            Route::get('/editar/{id}', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\MateriasController@editar',
                'as' => 'materiasEditar'
            ]);
            Route::post('/actualizar', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\MateriasController@actualizar',
                'as' => 'materiasActualizar'
            ]);
            Route::get('/eliminar/{id}', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\MateriasController@eliminar',
                'as' => 'materiasEliminar'
            ]);
            Route::get('/informacion/{id}', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\MateriasController@informacion',
                'as' => 'materiasInformacion'
            ]);
        });
        Route::group(["prefix" => "/grupos", 'middleware' => ['auth', 'revalidate']], function () {
            Route::get('/', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\GruposController@index',
                'as' => 'gruposIndex'
            ]);
            Route::get('/registrar', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\GruposController@registrar',
                'as' => 'gruposRegistrar'
            ]);
            Route::post('/agregar', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\GruposController@agregar',
                'as' => 'gruposAgregar'
            ]);
            Route::get('/editar/{id}', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\GruposController@editar',
                'as' => 'gruposEditar'
            ]);
            Route::post('/actualizar', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\GruposController@actualizar',
                'as' => 'gruposActualizar'
            ]);
            Route::get('/eliminar/{id}', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\GruposController@eliminar',
                'as' => 'gruposEliminar'
            ]);
            Route::get('/informacion/{id}', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\GruposController@informacion',
                'as' => 'gruposInformacion'
            ]);
            Route::get('/alumnos/{id}', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\GruposController@alumnos',
                'as' => 'gruposAlumnos'
            ]);
        });
        Route::group(["prefix" => "/grupos"], function () {
            Route::get('/materias', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\GruposController@materias',
                'as' => 'gruposMaterias'
            ]);
        });
        Route::group(["prefix" => "/alumnos", 'middleware' => ['auth', 'revalidate']], function () {
            Route::get('/', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\AlumnosController@index',
                'as' => 'alumnosIndex'
            ]);
            Route::get('/registrar', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\AlumnosController@registrar',
                'as' => 'alumnosRegistrar'
            ]);
            Route::post('/agregar', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\AlumnosController@agregar',
                'as' => 'alumnosAgregar'
            ]);
            Route::get('/editar/{id}', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\AlumnosController@editar',
                'as' => 'alumnosEditar'
            ]);
            Route::post('/actualizar', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\AlumnosController@actualizar',
                'as' => 'alumnosActualizar'
            ]);
            Route::get('/eliminar/{id}', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\AlumnosController@eliminar',
                'as' => 'alumnosEliminar'
            ]);
            Route::get('/informacion/{id}', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\AlumnosController@informacion',
                'as' => 'alumnosInformacion'
            ]);
            Route::get('/grupos', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\AlumnosController@grupos',
                'as' => 'alumnosGrupos'
            ]);
        });
        Route::group(["prefix" => "/alumnos"], function () {
            Route::get('/datosPadre', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\AlumnosController@datosPadre',
                'as' => 'alumnosDatosPadre'
            ]);
        });
        Route::group(["prefix" => "/maestros", 'middleware' => ['auth', 'revalidate']], function () {
            Route::get('/', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\MaestrosController@index',
                'as' => 'maestrosIndex'
            ]);
            Route::get('/registrar', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\MaestrosController@registrar',
                'as' => 'maestrosRegistrar'
            ]);
            Route::post('/agregar', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\MaestrosController@agregar',
                'as' => 'maestrosAgregar'
            ]);
            Route::get('/editar/{id}', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\MaestrosController@editar',
                'as' => 'maestrosEditar'
            ]);
            Route::post('/actualizar', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\MaestrosController@actualizar',
                'as' => 'maestrosActualizar'
            ]);
            Route::get('/eliminar/{id}', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\MaestrosController@eliminar',
                'as' => 'maestrosEliminar'
            ]);
            Route::get('/informacion/{id}', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\MaestrosController@informacion',
                'as' => 'maestrosInformacion'
            ]);
            Route::get('/grupos/{id}', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\MaestrosController@grupos',
                'as' => 'maestrosGrupos'
            ]);
            Route::get('/materiasMaestro/{id}', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\MaestrosController@materiasMaestro',
                'as' => 'maestrosmateriasMaestro'
            ]);
        });
        Route::group(["prefix" => "/maestros"], function () {
            Route::get('/materias', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\MaestrosController@materias',
                'as' => 'maestrosmaterias'
            ]);
        });
        Route::group(["prefix" => "/usuarios", 'middleware' => ['auth', 'revalidate']], function () {
            Route::get('/', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\UsuariosController@index',
                'as' => 'usuariosIndex'
            ]);
            Route::get('/registrar', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\UsuariosController@registrar',
                'as' => 'usuariosRegistrar'
            ]);
            Route::post('/agregar', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\UsuariosController@agregar',
                'as' => 'usuariosAgregar'
            ]);
            Route::get('/editar/{id}', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\UsuariosController@editar',
                'as' => 'usuariosEditar'
            ]);
            Route::post('/actualizar', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\UsuariosController@actualizar',
                'as' => 'usuariosActualizar'
            ]);
            Route::get('/eliminar/{id}', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\UsuariosController@eliminar',
                'as' => 'usuariosEliminar'
            ]);
            Route::get('/informacion/{id}', [
                'uses' => 'App\Http\Controllers\Administrador\Catalogos\UsuariosController@informacion',
                'as' => 'usuariosInformacion'
            ]);
        });
    });

    Route::group(["prefix" => "/asistencias", 'middleware' => ['auth', 'revalidate']], function () {
        Route::get('/', [
            'uses' => 'App\Http\Controllers\AsistenciasController@index',
            'as' => 'appAsistencias'
        ]);
        Route::get('/eliminar/{id}', [
            'uses' => 'App\Http\Controllers\AsistenciasController@eliminar',
            'as' => 'appAsistenciasEliminar'
        ]);
    });
    Route::group(["prefix" => "/asistencias"], function () {
        Route::get('/asistenciasTable', [
            'uses' => 'App\Http\Controllers\AsistenciasController@asistenciasTable',
            'as' => 'asistenciasTable'
        ]);
    });


    Route::group(["prefix" => "/configuraciones", 'middleware' => ['auth', 'revalidate']], function () {
        Route::get('/', [
            'uses' => 'App\Http\Controllers\ConfiguracionesController@index',
            'as' => 'appConfiguraciones'
        ]);
        Route::post('/actualizar', [
            'uses' => 'App\Http\Controllers\ConfiguracionesController@actualizar',
            'as' => 'appConfiguracionesActualizar'
        ]);
    });

    Route::get('/misGrupos', [
        'uses' => 'App\Http\Controllers\Maestro\MaestroController@misGrupos',
        'as' => 'misGruposIndex'
    ]);
    Route::get('/misAsistencias', [
        'uses' => 'App\Http\Controllers\Maestro\MaestroController@misAsistencias',
        'as' => 'misAsistenciasIndex'
    ]);
    Route::get('/misAlumnos/{id}', [
        'uses' => 'App\Http\Controllers\Maestro\MaestroController@misAlumnos',
        'as' => 'misAlumnosIndex'
    ]);
});
