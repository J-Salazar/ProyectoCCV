@extends('administrador.layout.plantilla')

@section('contenido')

    <h1 class="mt-4">Clientes</h1>

                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">{{Session::get('mensaje')}} </li>
                        {{ Session::forget('mensaje') }}
                    </ol>

    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Cliente</th>
                    <th>RUC</th>
                    <th>Repr. legal</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Proyectos</th>
                    <th><span> </span> </th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Cliente</th>
                    <th>RUC</th>
                    <th>Repr. legal</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Proyectos</th>
                    <th><span> </span> </th>
                </tr>
                </tfoot>


                <tbody>
                @foreach($clientes as $cliente)
                    <tr>
                        <th scope="row">{{ $cliente->razonsocial }}</th>
                        <td>{{ $cliente->ruc }}</td>
                        <td>{{ $cliente->representante }}</td>
                        <td>{{ $cliente->contacto }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td class="">
                            @if($cliente->usuarioid == $usuario->id)
                            <button class="btn-primary rounded"><a href="{{url('/administrador/verproyecto/'.$cliente->id)}}" class="text-white text-decoration-none">Ver Proyecto</a></button>
                            <button class="btn-primary rounded"><a href="{{url('/administrador/crearproyecto/'.$cliente->id)}}" class="text-white text-decoration-none">Crear Proyecto</a></button></td>
                            @else
                            <button class="btn-primary rounded"><a href="{{url('/administrador/verproyecto/'.$cliente->id)}}" class="text-white text-decoration-none">Ver Proyecto</a></button>
                            @endif
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Dropdown button
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach


            </table>
        </div>
    </div>

@endsection