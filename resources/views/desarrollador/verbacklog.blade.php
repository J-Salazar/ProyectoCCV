@extends('desarrollador.layout.plantilla')

@section('contenido')

    <h1 class="mt-4">Board</h1>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">{{Session::get('mensaje')}} </li>
        {{ Session::forget('mensaje') }}
    </ol>

    <h2 class="mt-4">Sprint</h2>

    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                <tr>
                    <th>Nro</th>
                    <th>Pendientes</th>
                    <th>En proceso</th>
                    <th>Finalizados</th>

                </tr>
                </thead>

                <tfoot class="thead-dark">
                <tr>
                    <th>Nro</th>
                    <th>Pendientes</th>
                    <th>En proceso</th>
                    <th>Finalizados</th>
                </tr>
                </tfoot>

                <tbody>
                @php
                    $i=1
                @endphp
                @foreach($historias as $historia)

                    <tr>
                    @if($historia == null)
                        <td></td>
                        <td>    </td>
                        <td> No existen registros    </td>
                        <td>    </td>
                    @else
                        @if($historia->estado == 'pendiente')
                            <td>{{$i}}</td>
                            <td class="bg-info">{{$historia->resumen}}</td>
                            <td></td>
                            <td></td>
                        @elseif($historia->estado == 'en proceso')
                            <td>{{$i}}</td>
                            <td></td>
                            <td class="bg-success">{{$historia->resumen}}</td>
                            <td></td>
                        @elseif($historia->estado == 'finalizado')
                            <td>{{$i}}</td>
                            <td></td>
                            <td></td>
                            <td class="bg-primary">{{$historia->resumen}}</td>
                        @endif
                    @endif
                    </tr>
                    @php
                        $i++;
                    @endphp
                @endforeach
                </tbody>


            </table>
        </div>
    </div>

{{--    <table class="table">--}}
{{--        <caption>Lista de Historias</caption>--}}
{{--        <thead class="thead-dark">--}}
{{--        <tr>--}}
{{--            <th scope="col">Nro.</th>--}}
{{--            <th scope="col">Pendientes</th>--}}
{{--            <th scope="col">En proceso</th>--}}
{{--            <th scope="col">Finalizados</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        <tr>--}}
{{--            <th scope="row">1</th>--}}
{{--            <td class="table-primary">Levantar la base de datos <br>(11/01/2021-12/01/2021)</td>--}}
{{--            <td class="table-warning">Incorporar tablas a la base de datos<br>(11/01/2021-12/01/2021)</td>--}}
{{--            <td class="table-success">Crear Tablas del Back End<br>(11/01/2021-12/01/2021)</td>--}}

{{--        </tr>--}}
{{--        <tr>--}}
{{--            <th scope="row">2</th>--}}
{{--            <td class="table-primary">Jacob</td>--}}
{{--            <td class="table-warning">Thornton</td>--}}
{{--            <td class="table-success"></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <th scope="row">3</th>--}}
{{--            <td class="table-primary">Larry</td>--}}
{{--            <td class="table-warning"></td>--}}
{{--            <td class="table-success"></td>--}}
{{--        </tr>--}}
{{--        </tbody>--}}

{{--    </table>--}}

    <h2 class="mt-4">Indicador</h2>

    @php
        $historias = App\HistoriaUsuario::all()->count();
        if ($historias != 0){
            $h1 = App\HistoriaUsuario::Where('estado','pendiente')->count();
            $h2 = App\HistoriaUsuario::Where('estado','en proceso')->count();
            $h3 = App\HistoriaUsuario::Where('estado','finalizado')->count();

            $i = floor($h1*100 / $historias);
            $j = floor($h2*100 / $historias);
            $k = floor($h3*100 / $historias);
        } else{
            $i = 0;
            $j = 0;
            $k = 0;
        }
    @endphp

    <label for="pendiente">Pendientes:</label>
    <div class="progress" style="height: 35px;">
        <div class="progress-bar bg-info" role="progressbar" style="width: {{$i}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{$i}}%</div>
    </div>

    <label for="pendiente">En proceso:</label>
    <div class="progress" style="height: 35px;">
        <div class="progress-bar bg-success" role="progressbar" style="width: {{$j}}%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">{{$j}}%</div>
    </div>

    <label for="pendiente">Finalizados:</label>
    <div class="progress" style="height: 35px;">
        <div class="progress-bar bg-primary" role="progressbar" style="width: {{$k}}%;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100">{{$k}}%</div>
    </div>




@endsection
