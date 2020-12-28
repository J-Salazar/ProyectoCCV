<?php

namespace App\Http\Controllers;

use App\Proyecto;
use App\Stakeholder;
use Illuminate\Http\Request;

class StakeholderController extends Controller
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

        $proyectos = Proyecto::all();

        return view('administrador.crearstakeholder')->with(['usuario'=>$usuario,'proyectos'=>$proyectos]);
    }

    public function crearstakeholder(Request $request){

        $nuevostakeholder = new Stakeholder;

        $nuevostakeholder->nombre = $request->nombre;
        $nuevostakeholder->apellido = $request->apellido;
        $nuevostakeholder->email = $request->email;
        $nuevostakeholder->proyecto = $request->proyecto;


        $nuevostakeholder->save();

        $mensaje = 'Stakeholder creado exitosamente';
        $usuario = auth()->user();

        return redirect(url('/administrador/verstakeholders'))->with(['mensaje'=>$mensaje,'usuario'=>$usuario]);

    }



    public function ver(Request $request){

        $stakeholders = Stakeholder::all();
        $usuario = auth()->user();

        return view('administrador.verstakeholder')->with(['stakeholders'=>$stakeholders, 'usuario'=>$usuario]);
    }

    public function editar(Request $request, $stakeholderid){

        $stakeholder = Stakeholder::where('id',$stakeholderid)->get()->first();
        $usuario = auth()->user();

        $proyectos = Proyecto::all();


        return view('administrador.editarstakeholder')->with(['usuario'=>$usuario,'stakeholderid'=>$stakeholderid,'stakeholder'=>$stakeholder,
            'proyectos'=>$proyectos]);
    }

    public function editarstakeholder(Request $request, $stakeholderid){

        $stakeholder = Stakeholder::Find($stakeholderid);


        $stakeholder->nombre = $request->nombre;
        $stakeholder->apellido = $request->apellido;
        $stakeholder->email = $request->email;
        $stakeholder->proyecto = $request->proyecto;


        $stakeholder->save();

        $mensaje = 'Stakeholder actualizado';
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
     * @param  \App\Stakeholder  $stakeholder
     * @return \Illuminate\Http\Response
     */
    public function show(Stakeholder $stakeholder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stakeholder  $stakeholder
     * @return \Illuminate\Http\Response
     */
    public function edit(Stakeholder $stakeholder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stakeholder  $stakeholder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stakeholder $stakeholder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stakeholder  $stakeholder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stakeholder $stakeholder)
    {
        //
    }
}
