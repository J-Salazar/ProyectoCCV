@extends('administrador.layout.plantilla')

@section('contenido')

    <h1 class="mt-4">Stakeholders</h1>

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
                    <th>Proyecto</th>

                    <th><span> </span> </th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Proyecto</th>

                    <th><span> </span> </th>
                </tr>
                </tfoot>


                <tbody>
                @foreach($stakeholders as $stakeholder)

                    <tr>

                        {{--                        @if($cliente->usuarioid == $usuario->id)--}}

                        <th scope="row">{{ $stakeholder->nombre }}</th>
                        <td>{{ $stakeholder->apellido }}</td>
                        <td>{{ $stakeholder->email }}</td>
                        @php
                            $proyecto = App\Proyecto::Where('id',$stakeholder->proyecto)->first()
                        @endphp
                        <td>{{ $proyecto->nombre }}</td>


                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Acciones
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{url('administrador/editarstakeholder/'.$stakeholder->id)}}">Editar</a>
                                    <a class="dropdown-item" href="#">Eliminar</a>
                                </div>
                            </div>
                        </td>

                        {{--                        @endif--}}
                    </tr>

                @endforeach


            </table>
        </div>
    </div>

@endsection
