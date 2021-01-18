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
                <thead class="thead-dark">
                <tr>
                    <th>Resumen</th>
                    <th>Nombre</th>
                    <th>Desarrollador</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Final</th>
                    <th>prioridad</th>
                    <th>Épica</th>

                    <th><span> </span> </th>
                </tr>
                </thead>
                <tfoot class="thead-dark">
                <tr>
                    <th>Resumen</th>
                    <th>Nombre</th>
                    <th>Desarrollador</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Final</th>
                    <th>prioridad</th>
                    <th>Épica</th>

                    <th><span> </span> </th>
                </tr>
                </tfoot>


                <tbody>
                @foreach($historias as $historia)
                    <tr>

                        @if($historia->desarrollador == $usuario->id)

{{--                            @php--}}
{{--                                $proyecto = App\Proyecto::Where('id',$historia->proyecto)->first()--}}
{{--                            @endphp--}}

                            @php
                                $epica = App\Epica::Where('id',$historia->epica)->first()
                            @endphp

                            <th scope="row">{{ $historia->resumen }}</th>
                            <td>{{ $historia->descripcion }}</td>
                            <td>{{ $historia->usuario }}</td>

                            <td><input type="datetime-local" id="meeting-time"
                                       name="meeting-time" value="{{ $historia->fechainicio }}"
                                       readonly>

                            </td>

                            <td><input type="datetime-local" id="meeting-time"
                                       name="meeting-time" value="{{ $historia->fechafinal }}"
                                        readonly>

                            </td>


                            <td>{{ $historia->prioridad }}</td>

                            <td>{{ $epica->nombre }}</td>

                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
{{--                                        <a class="dropdown-item" href="{{url('desarrollador/editarhistoria/'.$historia->id)}}">Editar</a>--}}
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
