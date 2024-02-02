<?php

namespace App\Http\Controllers\Maestro;

use App\Models\User;
use App\Models\Grupo;
use App\Models\Maestro;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MaestroController extends Controller
{
    public function misGrupos(){
        $maestro = Maestro::where('user_id',session()->get('usuario_id'))->get()->first();

        return view("app.maestro.misGrupos",["maestro"=>$maestro]);
    }

    public function misAsistencias(){
        if(session()->get('usuario_tipo') == "P"){
            $user = User::find(session()->get('usuario_id'));
            return view("app.padre.asistencias",["user"=>$user]);
        }
        $maestro = Maestro::where('user_id',session()->get('usuario_id'))->get()->first();
        return view("app.maestro.asistencias",["maestro"=>$maestro]);
    }

    public function misAlumnos($id){
        $grupo = Grupo::find($id);
        return view("app.maestro.alumnos",["grupo"=>$grupo]);
    }
}
