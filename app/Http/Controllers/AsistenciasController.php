<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Alumno;
use App\Models\AlumnoAsistencia;
use Illuminate\Http\Request;
use App\Exports\AsistenciasExport;
use Maatwebsite\Excel\Facades\Excel;

class AsistenciasController extends Controller
{
    public function index(){
        $grupos = Grupo::where('estatus','A')->get();
        return view("app.asistencias.index",["grupos"=>$grupos]);
    }

    public function eliminar($id){
        $asistencia = AlumnoAsistencia::find($id);
        $asistencia -> delete();

        alert()->warning("Asistencia eliminada correctamente.")->autoclose(5000);
        return redirect()->route('appAsistencias');
    }

    public function asistenciasTable(){

        if(isset($_GET["alumno"])){
            $asistencias = AlumnoAsistencia::where('alumno_id',$_GET["alumno"])->with('alumno')->get();
            return view("app.asistencias.ajax.asistenciasTableAlumno",["asistencias"=>$asistencias]);
        }
        $asistencias = AlumnoAsistencia::whereDate('fecha',$_GET["fecha"])->with('alumno')->get();
        return view("app.asistencias.ajax.asistenciasTable",["asistencias"=>$asistencias]);
    }

    public function generateExcelAsistencias(){
        return Excel::download(
            new AsistenciasExport($_GET["fecha"],$_GET["grupo"]),
            "asistencias_".date('Y_m_d').".xlsx",
            'Xlsx',
            ['X-Vapor-Base64-Encode' => 'True']
        );
    }
}
