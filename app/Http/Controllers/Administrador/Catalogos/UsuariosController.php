<?php

namespace App\Http\Controllers\Administrador\Catalogos;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\UsuariosExport;
use Maatwebsite\Excel\Facades\Excel;

class UsuariosController extends Controller
{
    public function index(){
        $usuarios = User::where([['estatus','A'],['id','!=',session()->get('usuario_id')]])->get();
        return view("app.catalogos.usuarios.index",["usuarios"=>$usuarios]);
    }

    public function registrar(){
        return view("app.catalogos.usuarios.registrar");
    }

    public function agregar(Request $request){
        $data = $request->all();

        $temp = User::where('email',$data["email"])->get()->first();
        if($temp != null){
            alert()->warning("Ya existe un un usuario con el correo electronico ingresado.")->autoclose(5000);
            return redirect()->route('usuariosRegistrar')->withInput();
        }

        $user = new User();
        $user -> email = $data["email"];
        $user -> name = $data["nombre"];
        $user -> tipo = "A";
        $user -> password = bcrypt($data["password"]);
        $user -> save();

        alert()->success("Usuario registrado correctamente.")->autoclose(5000);
        return redirect()->route('usuariosIndex');
    }

    public function editar($id){
        $usuario = User::find($id);
        return view("app.catalogos.usuarios.editar",["usuario"=>$usuario]);
    }

    public function actualizar(Request $request){
        $data = $request->all();

        $temp = User::where([['email',$data["email"],['id','!=',$data["id"]]]])->get()->first();
        if($temp != null){
            if($temp->id != $data["id"]){
                alert()->warning("Ya existe un un usuario con el correo electronico ingresado.")->autoclose(5000);
                return redirect()->route('usuariosEditar',$data["id"])->withInput();
            }
        }

        $user = User::find($data["id"]);
        $user -> email = $data["email"];
        $user -> name = $data["nombre"];
        if($data["password"] != "")
            $user -> password = bcrypt($data["password"]);
        $user -> save();
        
        alert()->success("Usuario actualizado correctamente.")->autoclose(5000);
        return redirect()->route('usuariosIndex');
    }

    public function eliminar($id){
        $user = User::find($id);
        $user -> estatus = "I";
        $user -> save();

        alert()->warning("Usuario eliminado correctamente.")->autoclose(5000);
        return redirect()->route('usuariosIndex');
    }

    public function informacion($id){
        $usuario = User::find($id);
        return view("app.catalogos.usuarios.informacion",["usuario"=>$usuario]);
    }
    
    public function generateExcelUsuarios(){
        return Excel::download(
            new UsuariosExport(),
            "usuarios_".date('Y_m_d').".xlsx",
            'Xlsx',
            ['X-Vapor-Base64-Encode' => 'True']
        );
    }
}
