<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public static function creardatossesion($request) {
        $request->session()->put('sessionup',  true);
        $request->session()->put('usuario_id',  Auth::user()->id);
        $request->session()->put('usuario_tipo',  Auth::user()->tipo);
        $request->session()->put('usuario_nombre',  Auth::user()->name);
        $request->session()->put('usuario_email',  Auth::user()->email);
        $request->session()->put('usuario_imagen',  Auth::user()->imagen);
        $request->session()->put('usuario_estatus',  Auth::user()->estatus);

    }
}
