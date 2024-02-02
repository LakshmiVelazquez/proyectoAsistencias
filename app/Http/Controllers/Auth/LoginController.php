<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\SessionController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/app';

    public function loginView(){
        return view('auth.login');
    }

    public function postlogin(Request $request){

        if($request != null){
            if (method_exists($this, 'hasTooManyLoginAttempts') &&
                $this->hasTooManyLoginAttempts($request)) {
                $this->fireLockoutEvent($request);
                return $this->sendLockoutResponse($request);
            }
            if ($this->attemptLogin($request)) {
                SessionController::creardatossesion($request);
                return $this->sendLoginResponse($request);
            }else{
                alert()->warning("Error al ingresar usuario o contraseña.")->autoclose(5000);
                return redirect()->route('login');
            }
        }else{
            alert()->warning("Error al ingresar usuario o contraseña.")->autoclose(5000);
            return redirect()->route('login');
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request){
        $this->guard()->logout();

        $request->session()->invalidate();
        $request->session()->forget('key');
        
        $request->session()->flush();
        return $this->loggedOut($request) ?: redirect('/');
    }
}
