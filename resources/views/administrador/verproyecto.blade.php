@extends('administrador.layout.plantilla')

@section('contenido')

    <h1 class="mt-4">Cliente: <span class="font-weight-bold ">{{$cliente->razonsocial}}</span> - Proyectos</h1>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"> </li>
    </ol>

    {{--    @auth--}}
    {{--        {{$num = auth()->user()->id}}--}}
    {{--    @endauth--}}

    @foreach($proyectos as $proyecto)

        <form class="form-horizontal text-left" role="form" method="POST" action="#">

            <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                <label for="nombre" class="control-label">Nombre del proyecto</label>

                <div class="">
                    <input id="nombre" type="string" class="form-control" name="nombre" value="{{$proyecto->nombre}}" readonly>

                    @if ($errors->has('nombre'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                <label for="descripcion" class="control-label">Descripcion</label>

                <div class="">
                    <input id="descripcion" type="string" class="form-control" name="descripcion" value="{{$proyecto->descripcion}}" readonly>

                    @if ($errors->has('descripcion'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('stakeholder') ? ' has-error' : '' }}">
                <label for="stakeholder" class="control-label">Stakeholder</label>

                <div class="">
                    @php
                        $stakeholder = App\Stakeholder::Where('id',$proyecto->stakeholder)->first()
                    @endphp
                    <input id="equipo" type="string" class="form-control" name="equipo" value="{{$stakeholder->id}}. {{$stakeholder->nombre}}" readonly>

                    @if ($errors->has('stakeholder'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('stakeholder') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('equipo') ? ' has-error' : '' }}">
                <label for="equipo" class="control-label">Equipo</label>

                <div class="">
                    @php
                        $equipo = App\Equipo::Where('id',$proyecto->equipo)->first()
                    @endphp
                    <input id="equipo" type="string" class="form-control" name="equipo" value="{{$equipo->id}}. {{$equipo->nombre}}" readonly>

                    @if ($errors->has('equipo'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('equipo') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('estimacion') ? ' has-error' : '' }}">
                <label for="estimacion" class="control-label">Estimacion</label>

                <div class="">
                    <input id="estimacion" type="string" class="form-control" name="estimacion" value="{{$proyecto->estimacion}}" readonly>

                    @if ($errors->has('estimacion'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('estimacion') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
                <label for="estado" class="control-label">Estado</label>

                <div class="">
                    <input id="estado" type="string" class="form-control" name="estado" value="{{$proyecto->estado}} " readonly>

                    @if ($errors->has('estado'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('estado') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="d-flex flex-row-reverse pb-2">
                @if($cliente->id == $proyecto->clienteid)
                <button type="submit" class="btn btn-link border-primary align-items-center">
                    <a class="" href="/administrador/editarproyecto/{{$proyecto->id}}">Editar</a>

                </button>
                @endif
            </div>


            <ol class="breadcrumb mb-4 bg-info">
                <li class="breadcrumb-item active "> </li>
            </ol>

        </form>


    @endforeach

    <button type="submit" class="btn btn-primary align-items-center">
        <a class="text-decoration-none text-white" href="{{url()->previous()}}">Regresar</a>

    </button>



@endsection
