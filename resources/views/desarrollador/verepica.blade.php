@extends('desarrollador.layout.plantilla')

@section('contenido')

    <h1 class="mt-4">Épicas</h1>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">{{Session::get('mensaje')}} </li>
        {{ Session::forget('mensaje') }}
    </ol>

    <div>
        <button>
            <a href="{{url('desarrollador/crearepica/'.$usuario->id)}}"> Crear epica </a>
        </button>
    </div>

    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Proyecto</th>
                    <th>Nombre</th>
                    <th>Resumen</th>

                    <th><span> </span> </th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Proyecto</th>
                    <th>Nombre</th>
                    <th>Resumen</th>

                    <th><span> </span> </th>
                </tr>
                </tfoot>


                <tbody>
                @foreach($epicas as $epica)
                    <tr>

                        @if($epica->desarrollador == $usuario->id)

                            <th scope="row">{{ $epica->proyecto }}</th>
                            <td>{{ $epica->nombre }}</td>
                            <td>{{ $epica->resumen }}</td>

                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{url('desarrollador/editarepica/'.$epica->id)}}">Editar</a>
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
