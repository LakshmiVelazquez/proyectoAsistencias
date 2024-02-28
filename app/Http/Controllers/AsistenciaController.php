<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\AlumnoAsistencia;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    public function asistencia()
    {
        return view("asistencia.index");
    }

    public function saveAsistencia(Request $request)
    {
        $data = $request->all();

        $busqueda = Alumno::where([['estatus', 'A'], ['matricula', $data["matricula"]]])->get()->first();
        if ($busqueda == null) {
            alert()->warning("La matricula ingresada es incorrecta.")->autoclose(5000);
            return redirect()->back()->withInput();
        }

        $temp = new AlumnoAsistencia();
        $temp->alumno_id = $busqueda->id;
        $temp->fecha = date('Y-m-d h:i:s');
        $temp->save();

        alert()->success("Asistencia registrada correctamente.")->autoclose(5000);
        return redirect()->route('publicAsistencia');
    }

    public function saveAsistenciaApi(Request $request, Alumno $alumno)
    {
        $busqueda = Alumno::where([['estatus', 'A'], ['matricula', $alumno["matricula"]]])->get()->first();
        if ($busqueda == null) {
            return response()->json('El alumno no se encuentra en el sistema.');
        }

        $temp = new AlumnoAsistencia();
        $temp->alumno_id = $busqueda->id;
        $temp->fecha = date('Y-m-d h:i:s');
        $temp->save();

        return response()->json('Asistencia registrada con éxito!');
    }
}
