<?php

namespace App\Http\Controllers;

use App\Equipo;
use App\Proyecto;
use App\Cliente;
use App\Stakeholder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ProyectoController extends Controller
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

    public function crear(Request $request, $clienteid){

        $usuario = auth()->user();

        $stakeholders = Stakeholder::all();

        $equipos =  Equipo::all();

        return view('administrador.crearproyecto')->with(['clienteid'=>$clienteid,'usuario'=>$usuario,
            'stakeholders'=>$stakeholders, 'equipos'=>$equipos]);
    }

    public function crearproyecto(Request $request, $clienteid){

        $nuevoproyecto = new Proyecto;

        //$new_cliente -> orgnzs() -> associate($orgnz);
        $nuevoproyecto->nombre      = $request->nombre;
        $nuevoproyecto->descripcion = $request->descripcion;
        $nuevoproyecto->stakeholder = $request->stakeholder;
        $nuevoproyecto->equipo      = $request->equipo;
        $nuevoproyecto->estimacion  = $request->estimacion;
        $nuevoproyecto->estado      = $request->estado;

        $nuevoproyecto->clienteid   = $request->clienteid;



        $nuevoproyecto->save();

        $mensaje = 'Proyecto creado exitosamente';
        $usuario = auth()->user();

        return redirect(url('/administrador/home'))->with(['mensaje'=>$mensaje,'usuario'=>$usuario]);

//        return view('administrador.crearproyecto')->with(['clienteid'=>$clienteid]);
    }

    public function verproyecto(Request $request, $clienteid){

        $proyectos = Proyecto::where('clienteid',$clienteid)->get();
        $cliente = Cliente::Find($clienteid);

        $usuario = auth()->user();

        return view('administrador.verproyecto')->with(['proyectos'=>$proyectos, 'cliente'=>$cliente,'usuario'=>$usuario]);
    }

    public function editar(Request $request, $proyectoid){

        $proyecto = Proyecto::where('id',$proyectoid)->get()->first();
        $usuario = auth()->user();
//        dd($proyecto);
        $stakeholders = Stakeholder::all();

        $equipos =  Equipo::all();

        return view('administrador.editarproyecto')->with(['proyecto'=>$proyecto,'usuario'=>$usuario,
            'stakeholders'=>$stakeholders,'equipos'=>$equipos]);
    }

    public function editarproyecto(Request $request, $proyectoid){

        $proyecto = Proyecto::Find($proyectoid);

        $proyecto->nombre       = $request->nombre;
        $proyecto->descripcion  = $request->descripcion;
        $proyecto->stakeholder  = $request->stakeholder;
        $proyecto->equipo       = $request->equipo;
        $proyecto->estimacion   = $request->estimacion;
        $proyecto->estado       = $request->estado;

        $proyecto->save();

        $mensaje = 'Proyecto actualizado';
        $usuario = auth()->user();

        return redirect(url()->previous())->with(['mensaje'=>$mensaje,'usuario'=>$usuario]);

    }

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
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function show(Proyecto $proyecto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyecto $proyecto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyecto $proyecto)
    {
        //
    }
}
