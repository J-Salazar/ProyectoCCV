<?php

namespace App\Http\Controllers;

use App\HistoriaUsuario;
use Illuminate\Http\Request;


class Backlog extends Controller
{
    //
    public function ver(){
        $usuario = auth()->user();
        $historias = HistoriaUsuario::all();

        return view('desarrollador.verbacklog')->with(['usuario'=>$usuario, 'historias'=>$historias]);
    }
}
