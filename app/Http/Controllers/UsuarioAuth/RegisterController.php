<?php

namespace App\Http\Controllers\UsuarioAuth;

use App\Usuario;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/usuario/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('usuario.guest');
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
            'email' => 'required|email|max:255|unique:usuarios',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Usuario
     */
    protected function create(array $data)
    {
        return Usuario::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function ver(Request $request){

        $usuario = auth()->user();
        $usuariostodos = Usuario::all();

        return view('administrador.verusuario')->with(['usuario'=>$usuario, 'usuariostodos'=>$usuariostodos]);
    }

    public function crear(Request $request){

            $usuario = auth()->user();

            return view('administrador.crearusuario')->with(['usuario'=>$usuario]);
        }

    public function crearusuario(Request $request){

        $nuevousuario = new Usuario;

        //$new_cliente -> orgnzs() -> associate($orgnz);
        $nuevousuario->nombre      = $request->nombre;
        $nuevousuario->apellido = $request->apellido;
        $nuevousuario->email = $request->email;
        $nuevousuario->equipo      = $request->equipo;
        $nuevousuario->password  = $request->password;
        $nuevousuario->nivel      = 'usuario';

        $nuevousuario->equipo      = $request->equipo;


        $nuevousuario->save();

        $mensaje = 'Usuario creado exitosamente';
        $usuario = auth()->user();

        return redirect(url('/administrador/verusuarios'))->with(['mensaje'=>$mensaje,'usuario'=>$usuario]);

//        return view('administrador.crearproyecto')->with(['clienteid'=>$clienteid]);
    }


    public function editar(Request $request, $usuarioid){

        $usuarion = Usuario::where('id',$usuarioid)->get()->first();
        $usuario = auth()->user();
//        dd($proyecto);
        $mensaje = 'Usuario editado correctamente';
        return view('administrador.editarusuario')->with(['usuario'=>$usuario,'usuarion'=>$usuarion, 'mensaje'=>$mensaje]);
    }

    public function editarusuario(Request $request, $usuarioid){

        $nuevousuario = Usuario::Find($usuarioid);

        //$new_cliente -> orgnzs() -> associate($orgnz);
        $nuevousuario->nombre      = $request->nombre;
        $nuevousuario->apellido = $request->apellido;
        $nuevousuario->email = $request->email;
        $nuevousuario->equipo      = $request->equipo;
//        $nuevousuario->password  = $request->password;
        $nuevousuario->nivel      = 'usuario';

//        $nuevousuario =

        $nuevousuario->equipo      = $request->equipo;


        $nuevousuario->save();

        $mensaje = 'Usuario actualizado';
        $usuario = auth()->user();

        return redirect(url()->previous())->with(['mensaje'=>$mensaje,'usuario'=>$usuario]);

    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('usuario.auth.register');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('usuario');
    }
}
