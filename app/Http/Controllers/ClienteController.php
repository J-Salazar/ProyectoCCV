<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
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

    public function crear(Request $request, $id){

        $usuario = auth()->user();

        return view('administrador.crearcliente')->with(['id'=>$id, 'usuario'=>$usuario]);
    }

    public function crearcliente(Request $request, $id){

        $cliente = new Cliente;

        $cliente->razonsocial   = $request->razonsocial;
        $cliente->representante = $request->representante;
        $cliente->ruc   = $request->ruc;
        $cliente->contacto  = $request->contacto;
        $cliente->email = $request->email;
        $cliente->direccion = $request->direccion;
        $cliente->stakeholder   = $request->stakeholder;

        $cliente->usuarioid = $id;
        $cliente->nivel = 'administrador';

        $cliente->save();

        $mensaje = 'Cliente creado satisfactoriamente';

        return redirect(url()->previous())->with(['mensaje'=>$mensaje]);
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
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
