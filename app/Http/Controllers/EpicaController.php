<?php

namespace App\Http\Controllers;

use App\Epica;
use App\Proyecto;
use Illuminate\Http\Request;


class EpicaController extends Controller
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

        $proyectos = Proyecto::all();

        return view('desarrollador.crearepica')->with(['desarrolladorid'=>$desarrolladorid,'usuario'=>$usuario,'proyectos'=>$proyectos]);
    }

    public function crearepica(Request $request, $desarrolladorid){

        $nuevoepica = new Epica;

        $nuevoepica->proyecto        = $request->proyecto;
        $nuevoepica->nombre    = $request->nombre;
        $nuevoepica->resumen        = $request->resumen;


        $nuevoepica->desarrollador  = $desarrolladorid;

        $nuevoepica->save();

        $mensaje = 'Epica creada exitosamente';
        $usuario = auth()->user();

        return redirect(url('/desarrollador/verepica'))->with(['mensaje'=>$mensaje,'usuario'=>$usuario]);

    }

    public function v(Request $request){

//        $epicas = Epica::where('desarrollador',$desarrolladorid)->get();
//        $cliente = Cliente::Find($desarrolladorid);

        $usuario = auth()->user();
        return redirect(url('desarrollador/verepica/'.$usuario->id))->with(['usuario'=>$usuario]);
//        return view('desarrollador.verepica')->with(['epicas'=>$epicas, 'usuario'=>$usuario]);
    }

    public function ver(Request $request, $desarrolladorid){

        $epicas = Epica::where('desarrollador',$desarrolladorid)->get();
//        $cliente = Cliente::Find($desarrolladorid);

        $usuario = auth()->user();

        return view('desarrollador.verepica')->with(['epicas'=>$epicas, 'usuario'=>$usuario]);
    }

    public function editar(Request $request, $epicaid){

        $epica = Epica::where('id',$epicaid)->get()->first();
        $usuario = auth()->user();

        $proyectos = Proyecto::all();

        return view('desarrollador.editarepica')->with(['epica'=>$epica,'usuario'=>$usuario,'epicaid'=>$epicaid,'proyectos'=>$proyectos]);
    }

    public function editarepica(Request $request, $epicaid){

        $epica = Epica::Find($epicaid);

        $epica->proyecto       = $request->proyecto;
        $epica->nombre  = $request->nombre;
        $epica->resumen  = $request->resumen;



        $epica->save();

        $mensaje = 'Epica actualizada';
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
     * @param  \App\Epica  $epica
     * @return \Illuminate\Http\Response
     */
    public function show(Epica $epica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Epica  $epica
     * @return \Illuminate\Http\Response
     */
    public function edit(Epica $epica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Epica  $epica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Epica $epica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Epica  $epica
     * @return \Illuminate\Http\Response
     */
    public function destroy(Epica $epica)
    {
        //
    }
}
