@extends('administrador.layout.plantilla')

@section('contenido')

    <h1 class="mt-4">Usuarios</h1>

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
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Equipo</th>

                    <th><span> </span> </th>
                </tr>
                </thead>
                <tfoot class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Equipo</th>

                    <th><span> </span> </th>
                </tr>
                </tfoot>


                <tbody>
                @foreach($usuariostodos as $usuarion)
                    <tr>
                        <th scope="row">{{ $usuarion->nombre }}</th>
                        <td>{{ $usuarion->apellido }}</td>
                        <td>{{ $usuarion->email }}</td>

                        @if($usuarion->equipo == '')
                            <td>No asignado</td>
                        @else
                            <td>{{$usuarion->equipo}}</td>
                        @endif

                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Acciones
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{url('administrador/editarusuario/'.$usuarion->id)}}">Editar</a>
                                    <a class="dropdown-item" href="#">Eliminar</a>

                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach


            </table>
        </div>
    </div>

@endsection
