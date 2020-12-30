<?php

namespace App\Http\Controllers\AdministradorAuth;

use App\Administrador;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/administrador/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('administrador.guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:administradors',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Administrador
     */
    protected function create(array $data)
    {
//        return Administrador::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'password' => bcrypt($data['password']),
//        ]);

        $nuevoadministrador = new Administrador;

        //$new_cliente -> orgnzs() -> associate($orgnz);
        $nuevoadministrador->nombre      = $data['name'];
        $nuevoadministrador->apellido  = $data['apellido'];
        $nuevoadministrador->email = $data['email'];
        $nuevoadministrador->password  = bcrypt($data['password']);

        $nuevoadministrador->nivel  = 'administrador';





        $nuevoadministrador->save();

        $mensaje = 'Desarrollador creado exitosamente';
//        $usuario = auth()->user();
        Auth::login($nuevoadministrador);
        return redirect(url('/administrador'));
//        return redirect(url('/administrador/verusuarios'))->with(['mensaje'=>$mensaje]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('administrador.auth.register');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('administrador');
    }
}
