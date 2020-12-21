@extends('desarrollador.layout.plantilla')

@section('contenido')

    <h1 class="mt-4">Historia de Usuarios</h1>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">{{Session::get('mensaje')}} </li>
        {{ Session::forget('mensaje') }}
    </ol>

    <div>
        <button>
            <a href="{{url('desarrollador/crearhistoria/'.$usuario->id)}}"> Crear historia </a>
        </button>
    </div>

    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>resumen</th>
                    <th>descripcion</th>
                    <th>usuario</th>
                    <th>proyecto</th>
                    <th>prioridad</th>
                    <th>Tiempo Estimado</th>
                    <th>epica</th>

                    <th><span> </span> </th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>resumen</th>
                    <th>descripcion</th>
                    <th>usuario</th>
                    <th>proyecto</th>
                    <th>prioridad</th>
                    <th>Tiempo Estimado</th>
                    <th>epica</th>

                    <th><span> </span> </th>
                </tr>
                </tfoot>


                <tbody>
                @foreach($historias as $historia)
                    <tr>

                        @if($historia->desarrollador == $usuario->id)

                            <th scope="row">{{ $historia->resumen }}</th>
                            <td>{{ $historia->descripcion }}</td>
                            <td>{{ $historia->usuario }}</td>
                            <td>{{ $historia->proyecto }}</td>
                            <td>{{ $historia->prioridad }}</td>
                            <td>{{ $historia->tiempoestimado }}</td>
                            <td>{{ $historia->epica }}</td>

                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{url('desarrollador/editarhistoria/'.$historia->id)}}">Editar</a>
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
