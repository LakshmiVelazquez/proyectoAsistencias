<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->char('tipo',5)->default('M');
            $table->string('imagen')->default('./img/user.png');
            $table->char('estatus',5)->default('A');
            $table->timestamps();
        });

        Schema::create('maestros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('nombre');
            $table->string('telefono');
            $table->char('estatus',5)->default('A');
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users');
        });
        
        Schema::create('alumnos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('telefono');
            $table->string('matricula');
            $table->char('estatus',5)->default('A');
            $table->timestamps();
        });

        Schema::create('padres', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('nombre');
            $table->string('telefono',20);
            $table->string('direccion');
            $table->char('estatus',5)->default('A');
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('padres_alumnos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('padre_id')->unsigned();
            $table->integer('alumno_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('padre_id')->references('id')->on('padres');
            $table->foreign('alumno_id')->references('id')->on('alumnos');
        });
        
        Schema::create('materias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('grado');
            $table->char('estatus',5)->default('A');
            $table->timestamps();
        });
        
        Schema::create('grupos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->char('grado',5);
            $table->char('grupo',5);
            $table->char('estatus',5)->default('A');
            $table->timestamps();
        });
        
        Schema::create('alumnos_grupos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('alumno_id')->unsigned();
            $table->integer('grupo_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('alumno_id')->references('id')->on('alumnos');
            $table->foreign('grupo_id')->references('id')->on('grupos');
        });

        Schema::create('grupos_materias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('materia_id')->unsigned();
            $table->integer('grupo_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('materia_id')->references('id')->on('materias');
            $table->foreign('grupo_id')->references('id')->on('grupos');
        });

        Schema::create('maestros_grupos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('maestro_id')->unsigned();
            $table->integer('grupo_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('maestro_id')->references('id')->on('maestros');
            $table->foreign('grupo_id')->references('id')->on('grupos');
        });

        Schema::create('maestros_materias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('maestro_id')->unsigned();
            $table->integer('materia_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('maestro_id')->references('id')->on('maestros');
            $table->foreign('materia_id')->references('id')->on('materias');
        });

        Schema::create('alumnos_asistencias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('alumno_id')->unsigned();
            $table->datetime('fecha');
            $table->char('estatus',5)->default('A');
            $table->timestamps();
            
            $table->foreign('alumno_id')->references('id')->on('alumnos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
