@extends('administrador.layout.plantilla')

@section('contenido')

    <h1 class="mt-4">Equipos</h1>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">{{Session::get('mensaje')}} </li>
        {{ Session::forget('mensaje') }}
    </ol>

    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Lider</th>
                    <th>Desarrollador</th>

                    <th><span> </span> </th>
                </tr>
                </thead>
                <tfoot class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Lider</th>
                    <th>Desarrollador</th>

                    <th><span> </span> </th>
                </tr>
                </tfoot>


                <tbody>
                @foreach($equipos as $equipo)

                    @if($equipo->administrador == $usuario->id)

                    <tr>

{{--                        @if($cliente->usuarioid == $usuario->id)--}}

                            <th scope="row">{{ $equipo->nombre }}</th>
                            <td>{{ $equipo->lider }}</td>
                            <td>{{ $equipo->desarrollador }}</td>


                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{url('administrador/editarequipo/'.$equipo->id)}}">Editar</a>
                                        <a class="dropdown-item" href="#">Eliminar</a>
                                    </div>
                                </div>
                            </td>

{{--                        @endif--}}
                    </tr>

                    @endif

                @endforeach


            </table>
        </div>
    </div>

@endsection
