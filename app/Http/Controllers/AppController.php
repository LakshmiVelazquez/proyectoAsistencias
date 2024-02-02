<?php

namespace App\Http\Controllers;

use App\Models\Maestro;
use App\Models\AlumnoAsistencia;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index(){
        if(session()->get('usuario_tipo') == "A"){
            $inicioSemana = date('Y-m-d', strtotime('monday this week', strtotime(date('Y-m-d'))));
            $finSemana = date('Y-m-d', strtotime('sunday this week', strtotime(date('Y-m-d'))));

            $asistenciasSemaneales = AlumnoAsistencia::whereDate('fecha','>=',$inicioSemana)->whereDate('fecha','<=',$finSemana)->get();
            return view("app.index",["asistenciasSemanales"=>count($asistenciasSemaneales)]);
        }else if(session()->get('usuario_tipo') == "M"){
            $maestro = Maestro::where('user_id',session()->get('usuario_id'))->get()->first();
            return view("app.maestro.index",["maestro"=>$maestro]);
        }else{
            return view("app.padre.index");
        }
    }
}
