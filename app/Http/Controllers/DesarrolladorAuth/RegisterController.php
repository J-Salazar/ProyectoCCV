<?php

namespace App\Http\Controllers\DesarrolladorAuth;

use App\Desarrollador;
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
    protected $redirectTo = '/desarrollador/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('desarrollador.guest');
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
            'email' => 'required|email|max:255|unique:desarrolladors',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Desarrollador
     */
    protected function create(array $data)
    {
        return Desarrollador::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function ver(Request $request){

        $usuario = auth()->user();
        $desarrolladores = Desarrollador::all();

        return view('administrador.verdesarrollador')->with(['usuario'=>$usuario, 'desarrolladores'=>$desarrolladores]);
    }

    public function crear(Request $request){

        $usuario = auth()->user();

        return view('administrador.creardesarrollador')->with(['usuario'=>$usuario]);
    }

    public function creardesarrollador(Request $request){

        $nuevodesarrollador = new Desarrollador();

        //$new_cliente -> orgnzs() -> associate($orgnz);
        $nuevodesarrollador->nombre      = $request->nombre;
        $nuevodesarrollador->apellido = $request->apellido;
        $nuevodesarrollador->email = $request->email;
        $nuevodesarrollador->equipo      = $request->equipo;
        $nuevodesarrollador->password  = bcrypt($request->password);
        $nuevodesarrollador->nivel      = 'desarrollador';

        $nuevodesarrollador->equipo      = $request->equipo;


        $nuevodesarrollador->save();

        $mensaje = 'Desarrollador creado exitosamente';
        $usuario = auth()->user();

        return redirect(url('/administrador/verusuarios'))->with(['mensaje'=>$mensaje,'usuario'=>$usuario]);

//        return view('administrador.crearproyecto')->with(['clienteid'=>$clienteid]);
    }


    public function editar(Request $request, $desarrolladorid){

        $desarrollador = Desarrollador::where('id',$desarrolladorid)->get()->first();
        $usuario = auth()->user();
//        dd($proyecto);
        $mensaje = 'Desarrollador editado correctamente';
        return view('administrador.editardesarrollador')->with(['usuario'=>$usuario,'desarrollador'=>$desarrollador, 'mensaje'=>$mensaje]);
    }

    public function editardesarrollador(Request $request, $desarrolladorid){

        $desarrollador = Desarrollador::Find($desarrolladorid);


        $desarrollador->nombre      = $request->nombre;
        $desarrollador->apellido = $request->apellido;
        $desarrollador->email = $request->email;
        $desarrollador->equipo      = $request->equipo;
//        $nuevousuario->password  = $request->password;
        $desarrollador->nivel      = 'usuario';


        $desarrollador->equipo      = $request->equipo;


        $desarrollador->save();

        $mensaje = 'Desarrollador actualizado';
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
        return view('desarrollador.auth.register');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('desarrollador');
    }
}
