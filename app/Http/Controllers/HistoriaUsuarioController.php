<?php

namespace App\Http\Controllers;

use App\Epica;
use App\HistoriaUsuario;
use App\Proyecto;
use Illuminate\Http\Request;

class HistoriaUsuarioController extends Controller
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


    public function crear(Request $request, $desarrolladorid){

        $usuario = auth()->user();

        $epicas = Epica::all();
        $proyectos = Proyecto::all();

        return view('desarrollador.crearhistoria')->with(['desarrolladorid'=>$desarrolladorid,'usuario'=>$usuario,'epicas'=>$epicas,'proyectos'=>$proyectos]);
    }

    public function crearhistoriausuario(Request $request, $desarrolladorid){

        $nuevohistoriausuario = new HistoriaUsuario;

        $nuevohistoriausuario->resumen   = $request->resumen;
        $nuevohistoriausuario->descripcion   = $request->descripcion;
        $nuevohistoriausuario->usuario   = $request->usuario;
        $nuevohistoriausuario->proyecto  = $request->proyecto;
        $nuevohistoriausuario->prioridad = $request->prioridad;
        $nuevohistoriausuario->tiempoestimado    = $request->tiempoestimado;
        $nuevohistoriausuario->epica = $request->epica;


        $nuevohistoriausuario->desarrollador  = $desarrolladorid;

        $nuevohistoriausuario->save();

        $mensaje = 'Historia de Usuario creada exitosamente';
        $usuario = auth()->user();

        return redirect(url('/desarrollador/verhistoria'))->with(['mensaje'=>$mensaje,'usuario'=>$usuario]);

    }

    public function v(Request $request){

//        $historiausuarios = historiausuario::where('desarrollador',$desarrolladorid)->get();
//        $cliente = Cliente::Find($desarrolladorid);

        $usuario = auth()->user();
        return redirect(url('desarrollador/verhistoria/'.$usuario->id))->with(['usuario'=>$usuario]);
//        return view('desarrollador.verhistoriausuario')->with(['historiausuarios'=>$historiausuarios, 'usuario'=>$usuario]);
    }

    public function ver(Request $request, $desarrolladorid){

        $historias = HistoriaUsuario::where('desarrollador',$desarrolladorid)->get();
//        $cliente = Cliente::Find($desarrolladorid);

        $usuario = auth()->user();

        return view('desarrollador.verhistoria')->with(['historias'=>$historias, 'usuario'=>$usuario]);
    }

    public function editar(Request $request, $historiausuarioid){

        $historia = HistoriaUsuario::where('id',$historiausuarioid)->get()->first();
        $usuario = auth()->user();

        $epicas = Epica::all();
        $proyectos = Proyecto::all();

        return view('desarrollador.editarhistoria')->with(['historia'=>$historia,'usuario'=>$usuario,'historiausuarioid'=>$historiausuarioid,
            'epicas'=>$epicas,'proyectos'=>$proyectos]);
    }

    public function editarhistoriausuario(Request $request, $historiausuarioid){

        $historiausuario = HistoriaUsuario::Find($historiausuarioid);

        $historiausuario->resumen   = $request->resumen;
        $historiausuario->descripcion   = $request->descripcion;
        $historiausuario->usuario   = $request->usuario;
        $historiausuario->proyecto  = $request->proyecto;
        $historiausuario->prioridad = $request->prioridad;
        $historiausuario->tiempoestimado    = $request->tiempoestimado;
        $historiausuario->epica = $request->epica;




        $historiausuario->save();

        $mensaje = 'Historia de Usuario actualizada';
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
     * @param  \App\HistoriaUsuario  $historiaUsuario
     * @return \Illuminate\Http\Response
     */
    public function show(HistoriaUsuario $historiaUsuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HistoriaUsuario  $historiaUsuario
     * @return \Illuminate\Http\Response
     */
    public function edit(HistoriaUsuario $historiaUsuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HistoriaUsuario  $historiaUsuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistoriaUsuario $historiaUsuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HistoriaUsuario  $historiaUsuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(HistoriaUsuario $historiaUsuario)
    {
        //
    }
}
