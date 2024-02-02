<?php

namespace App\Http\Controllers\Administrador\Catalogos;

use App\Models\User;
use App\Models\Grupo;
use App\Models\Maestro;
use App\Models\MaestroGrupo;
use App\Models\GrupoMateria;
use App\Models\MaestroMateria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\MaestrosExport;
use Maatwebsite\Excel\Facades\Excel;

class MaestrosController extends Controller
{
    public function index(){
        $maestros = Maestro::where('estatus','A')->get();
        return view("app.catalogos.maestros.index",["maestros"=>$maestros]);
    }

    public function registrar(){
        $grupos = Grupo::where('estatus','A')->get();
        return view("app.catalogos.maestros.registrar",["grupos"=>$grupos]);
    }

    public function agregar(Request $request){
        $data = $request->all();

        $temp = User::where('email',$data["email"])->get()->first();
        if($temp != null){
            alert()->warning("Ya existe un un usuario con el correo electronico ingresado.")->autoclose(5000);
            return redirect()->route('maestrosRegistrar')->withInput();
        }

        $user = new User();
        $user -> email = $data["email"];
        $user -> name = $data["nombre"];
        $user -> password = bcrypt($data["password"]);
        $user -> save();

        $maestro = new Maestro();
        $maestro -> user_id = $user->id;
        $maestro -> nombre = $data["nombre"];
        $maestro -> telefono = $data["telefono"];
        $maestro -> save();

        $grupos = json_decode($data["grupos"]);

        foreach($grupos as $grupo){
            $temp = new MaestroGrupo();
            $temp -> grupo_id = $grupo;
            $temp -> maestro_id = $maestro->id;
            $temp -> save();
        }

        $materias = json_decode($data["materias"]);

        foreach($materias as $materia){
            $temp = new MaestroMateria();
            $temp -> materia_id = $materia;
            $temp -> maestro_id = $maestro->id;
            $temp -> save();
        }

        alert()->success("Maestro registrado correctamente.")->autoclose(5000);
        return redirect()->route('maestrosIndex');
    }

    public function editar($id){
        $maestro = Maestro::find($id);
        $grupos = Grupo::where('estatus','A')->get();
        return view("app.catalogos.maestros.editar",["maestro"=>$maestro,"grupos"=>$grupos]);
    }

    public function actualizar(Request $request){
        $data = $request->all();

        $maestro = Maestro::find($data["id"]);
        $maestro -> nombre = $data["nombre"];
        $maestro -> telefono = $data["telefono"];
        $maestro -> save();
        
        foreach($maestro->materias as $materia){
            $materia->delete();
        }
        foreach($maestro->grupos as $grupo){
            $grupo->delete();
        }

        $grupos = json_decode($data["grupos"]);

        foreach($grupos as $grupo){
            $temp = new MaestroGrupo();
            $temp -> grupo_id = $grupo;
            $temp -> maestro_id = $maestro->id;
            $temp -> save();
        }

        $materias = json_decode($data["materias"]);

        foreach($materias as $materia){
            $temp = new MaestroMateria();
            $temp -> materia_id = $materia;
            $temp -> maestro_id = $maestro->id;
            $temp -> save();
        }
        
        alert()->success("Maestro actualizado correctamente.")->autoclose(5000);
        return redirect()->route('maestrosIndex');
    }

    public function eliminar($id){
        $maestro = Maestro::find($id);
        $maestro -> estatus = "I";
        $maestro -> save();

        foreach($maestro->materias as $materia){
            $materia->delete();
        }
        foreach($maestro->grupos as $grupo){
            $grupo->delete();
        }

        alert()->warning("Maestro eliminado correctamente.")->autoclose(5000);
        return redirect()->route('maestrosIndex');
    }

    public function informacion($id){
        $maestro = Maestro::find($id);
        return view("app.catalogos.maestros.informacion",["maestro"=>$maestro]);
    }

    public function materias(){
        $materias = GrupoMateria::whereIn('grupo_id',$_GET["grupos"])->with('materia')->get();
        
        $data = [
            'datos' => $materias
        ];

        return response()->json($data);
    }

    public function grupos($id){
        $maestro = Maestro::find($id);
        return view("app.catalogos.maestros.grupos",["maestro"=>$maestro]);
    }

    public function materiasMaestro($id){
        $maestro = Maestro::find($id);
        return view("app.catalogos.maestros.materias",["maestro"=>$maestro]);
    }
    
    public function generateExcelMaestros(){
        return Excel::download(
            new MaestrosExport(),
            "maestros_".date('Y_m_d').".xlsx",
            'Xlsx',
            ['X-Vapor-Base64-Encode' => 'True']
        );
    }
}
