<?php

namespace App\Http\Controllers\Administrador\Catalogos;

use App\Models\Grupo;
use App\Models\Materia;
use App\Models\GrupoMateria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\GruposExport;
use Maatwebsite\Excel\Facades\Excel;

class GruposController extends Controller
{
    public function index(){
        $grupos = Grupo::where('estatus','A')->get();
        return view("app.catalogos.grupos.index",["grupos"=>$grupos]);
    }

    public function registrar(){
        return view("app.catalogos.grupos.registrar");
    }

    public function agregar(Request $request){
        $data = $request->all();

        /*$busqueda = Grupo::where([['grado',$data["grado"]],['grupo',$data["grupo"]],['estatus','A']])->get()->first();
        if($busqueda != null){
            alert()->warning("Ya existe un grupo con los parametros ingresados.")->autoclose(5000);
            return redirect()->route('gruposRegistrar')->withInput();
        }*/

        $grupo = new Grupo();
        $grupo -> nombre = $data["nombre"];
        $grupo -> grupo = $data["grupo"];
        $grupo -> grado = $data["grado"];
        $grupo -> save();

        $materias = json_decode($data["materias"]);

        foreach($materias as $materia){
            $temp = new GrupoMateria();
            $temp -> grupo_id = $grupo->id;
            $temp -> materia_id = $materia;
            $temp -> save();
        }

        alert()->success("Grupo registrado correctamente.")->autoclose(5000);
        return redirect()->route('gruposIndex');
    }

    public function editar($id){
        $grupo = Grupo::find($id);
        return view("app.catalogos.grupos.editar",["grupo"=>$grupo]);
    }

    public function actualizar(Request $request){
        $data = $request->all();

        /*$busqueda = Grupo::where([['grado',$data["grado"]],['grupo',$data["grupo"]],['estatus','A'],['id','!=',$data["id"]]])->get()->first();
        if($busqueda != null){
            alert()->warning("Ya existe un grupo con los parametros ingresados.")->autoclose(5000);
            return redirect()->route('gruposRegistrar')->withInput();
        }*/

        $grupo = Grupo::find($data["id"]);
        $grupo -> nombre = $data["nombre"];
        $grupo -> grupo = $data["grupo"];
        $grupo -> grado = $data["grado"];
        $grupo -> save();

        $materias = json_decode($data["materias"]);

        foreach($materias as $materia){
            $temp = GrupoMateria::where([['materia_id',$materia->id],['grupo_id',$grupo->id]])->get()->first();
            if($materia->estatus == "I"){
                $temp -> delete();
            }else{
                if($temp == null){
                    $temp = new GrupoMateria();
                    $temp -> grupo_id = $grupo->id;
                    $temp -> materia_id = $materia->id;
                    $temp -> save();
                }
            }
        }
        
        alert()->success("Grupo actualizado correctamente.")->autoclose(5000);
        return redirect()->route('gruposIndex');
    }

    public function eliminar($id){
        $grupo = Grupo::find($id);
        $grupo -> estatus = "I";
        $grupo -> save();

        alert()->warning("Grupo eliminado correctamente.")->autoclose(5000);
        return redirect()->route('gruposIndex');
    }

    public function informacion($id){
        $grupo = Grupo::find($id);
        return view("app.catalogos.grupos.informacion",["grupo"=>$grupo]);
    }
    
    public function materias(){
        $materias = Materia::where([['estatus','A'],['grado',$_GET["grado"]]])->get();

        $data = [
            'datos' => $materias
        ];

        return response()->json($data);
    }

    public function alumnos($id){
        $grupo = Grupo::find($id);
        return view("app.catalogos.grupos.alumnos",["grupo"=>$grupo]);
    }

    public function generateExcelGrupos(){
        return Excel::download(
            new GruposExport(),
            "grupos_".date('Y_m_d').".xlsx",
            'Xlsx',
            ['X-Vapor-Base64-Encode' => 'True']
        );
    }
}
