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
                <thead class="thead-dark">
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
                <tfoot class="thead-dark">
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

                        @if($cliente->usuarioid == $usuario->id)

                            <th scope="row">{{ $cliente->razonsocial }}</th>
                            <td>{{ $cliente->ruc }}</td>
                            <td>{{ $cliente->representante }}</td>
                            <td>{{ $cliente->contacto }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td class="">
                                <button class="btn-primary rounded"><a href="{{url('/administrador/verproyecto/'.$cliente->id)}}" class="text-white text-decoration-none">Ver Proyecto</a></button>

                                <button class="btn-primary rounded"><a href="{{url('/administrador/crearproyecto/'.$cliente->id)}}" class="text-white text-decoration-none">Crear Proyecto</a></button>

                            </td>





                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Acciones
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Editar</a>
                                    <a class="dropdown-item" href="#">Eliminar</a>
                                </div>
                            </div>
                        </td>

                        @endif
                    </tr>

                @endforeach


            </table>
        </div>
    </div>

@endsection
