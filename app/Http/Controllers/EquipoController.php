<?php

namespace App\Http\Controllers;

use App\Equipo;
use App\Proyecto;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

//

    public function crear(Request $request){

        $usuario = auth()->user();

//        $proyectos = Equipo::all();

        return view('administrador.crearequipo')->with(['usuario'=>$usuario]);
    }

    public function crearequipo(Request $request){

        $usuario = auth()->user();

        $nuevoequipo = new Equipo;

        $nuevoequipo->nombre = $request->nombre;
        $nuevoequipo->lider = $request->lider;
        $nuevoequipo->desarrollador = $request->desarrollador;

        $nuevoequipo->administrador = $usuario->id;

        $nuevoequipo->save();

        $mensaje = 'Equipo creado exitosamente';


        return redirect(url('/administrador/verequipos'))->with(['mensaje'=>$mensaje,'usuario'=>$usuario]);

    }



    public function ver(Request $request){

        $equipos = Equipo::all();
        $usuario = auth()->user();

        return view('administrador.verequipo')->with(['equipos'=>$equipos, 'usuario'=>$usuario]);
    }

    public function editar(Request $request, $equipoid){

        $equipo = Equipo::where('id',$equipoid)->get()->first();
        $usuario = auth()->user();


        return view('administrador.editarequipo')->with(['usuario'=>$usuario,'equipoid'=>$equipoid,'equipo'=>$equipo]);
    }

    public function editarequipo(Request $request, $equipoid){

        $equipo = Equipo::Find($equipoid);

        $equipo->nombre       = $request->nombre;
        $equipo->lider  = $request->lider;
        $equipo->desarrollador  = $request->desarrollador;



        $equipo->save();

        $mensaje = 'Equipo actualizado';
        $usuario = auth()->user();

        return redirect(url()->previous())->with(['mensaje'=>$mensaje,'usuario'=>$usuario]);

    }

//

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function show(Equipo $equipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipo $equipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipo $equipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipo $equipo)
    {
        //
    }
}
