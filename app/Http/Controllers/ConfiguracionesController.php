<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ConfiguracionesController extends Controller
{
    public function index(){
        $user = User::find(session()->get('usuario_id'));
        
        return view("app.configuraciones.index",["user"=>$user]);
    }

    public function actualizar(Request $request){
        $data = $request->all();

        $temp = User::where('email',$data["email"])->get()->first();
        if($temp != null){
            if($temp->id != $data["id"]){
                alert()->warning("Ya existe un un usuario con el correo electronico ingresado.")->autoclose(5000);
                return redirect()->route('appConfiguraciones')->withInput();
            }
        }

        $user = User::find($data["id"]);
        $user -> name = $data["user"];
        $request->session()->put('usuario_nombre',  $data["user"]);

        if($data["password_c"] != "" && $data["password"] != ""){
            $user -> password = bcrypt($data["password"]);
        }

        $image = $request->file('imagen');
        if($image != null){    
            $imageName = time().'_1.'.$image->extension();
            $image->move(public_path('images/usuarios'),$imageName);
            $user -> imagen = "images/usuarios/".$imageName;

            $request->session()->put('usuario_imagen', "images/usuarios/".$imageName);
        }

        $user -> email = $data["email"];
        $user -> save();

        alert()->success("Usuario actualizado correctamente.")->autoclose(5000);
        return redirect()->route('appConfiguraciones');
    }
}
