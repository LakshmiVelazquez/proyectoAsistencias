<?php

namespace App\Http\Controllers\Administrador\Catalogos;

use App\Models\Materia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\MateriasExport;
use Maatwebsite\Excel\Facades\Excel;

class MateriasController extends Controller
{
    public function index(){
        $materias = Materia::where('estatus','A')->get();
        return view("app.catalogos.materias.index",["materias"=>$materias]);
    }

    public function registrar(){
        return view("app.catalogos.materias.registrar");
    }

    public function agregar(Request $request){
        $data = $request->all();

        $materia = new Materia();
        $materia -> nombre = $data["nombre"];
        $materia -> grado = $data["grado"];
        $materia -> save();

        alert()->success("Materia registrada correctamente.")->autoclose(5000);
        return redirect()->route('materiasIndex');
    }

    public function editar($id){
        $materia = Materia::find($id);
        return view("app.catalogos.materias.editar",["materia"=>$materia]);
    }

    public function actualizar(Request $request){
        $data = $request->all();

        $materia = Materia::find($data["id"]);
        $materia -> nombre = $data["nombre"];
        $materia -> grado = $data["grado"];
        $materia -> save();
        
        alert()->success("Materia actualizada correctamente.")->autoclose(5000);
        return redirect()->route('materiasIndex');
    }

    public function eliminar($id){
        $materia = Materia::find($id);
        $materia -> estatus = "I";
        $materia -> save();

        alert()->warning("Materia eliminada correctamente.")->autoclose(5000);
        return redirect()->route('materiasIndex');
    }

    public function informacion($id){
        $materia = Materia::find($id);
        return view("app.catalogos.materias.informacion",["materia"=>$materia]);
    }
    
    public function generateExcelMaterias(){
        return Excel::download(
            new MateriasExport(),
            "materias_".date('Y_m_d').".xlsx",
            'Xlsx',
            ['X-Vapor-Base64-Encode' => 'True']
        );
    }
}
