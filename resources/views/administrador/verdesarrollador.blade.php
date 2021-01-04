@extends('administrador.layout.plantilla')

@section('contenido')

    <h1 class="mt-4">Desarrolladores</h1>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">{{Session::get('mensaje')}} </li>
        {{ Session::forget('mensaje') }}
    </ol>

    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Equipo</th>

                    <th><span> </span> </th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Equipo</th>

                    <th><span> </span> </th>
                </tr>
                </tfoot>


                <tbody>
                @foreach($desarrolladores as $desarrollador)

                    @if($desarrollador->administrador == $usuario->id)
                    <tr>
                        <th scope="row">{{ $desarrollador->nombre }}</th>
                        <td>{{ $desarrollador->apellido }}</td>
                        <td>{{ $desarrollador->email }}</td>

                        @if($desarrollador->equipo == '')
                            <td>No asignado</td>
                        @else
                            @php
                                $equipo = App\Equipo::where('id',$desarrollador->equipo)->first();
                            @endphp

                            <td>{{$equipo->nombre}}</td>
                        @endif

                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Acciones
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{url('administrador/editardesarrollador/'.$desarrollador->id)}}">Editar</a>
                                    <a class="dropdown-item" href="#">Eliminar</a>

                                </div>
                            </div>
                        </td>
                    </tr>
                    @endif

                @endforeach


            </table>
        </div>
    </div>

@endsection
