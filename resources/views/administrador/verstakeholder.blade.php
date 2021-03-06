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
                <thead class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Proyecto</th>

                    <th><span> </span> </th>
                </tr>
                </thead>
                <tfoot class="thead-dark">
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


                    @if($stakeholder->administrador == $usuario->id)

                        <tr>

                            {{--                        @if($cliente->usuarioid == $usuario->id)--}}

                            <th scope="row">{{ $stakeholder->nombre }}</th>
                            <td>{{ $stakeholder->apellido }}</td>
                            <td>{{ $stakeholder->email }}</td>
                            @php
                                $proyecto = App\Proyecto::Where('id',$stakeholder->proyecto)->first();
                                //$proyecto = App\Proyecto::Where('id',11)->first();
                                //if($proyecto==null) $var = "123";
                                //dd($var);
                            @endphp
                            @if($proyecto==null)
                                <td>No asignado</td>
                            @else
                                <td>{{ $proyecto->nombre }}</td>
                            @endif

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

                @endif

                @endforeach


            </table>
        </div>
    </div>

@endsection

