@extends('administrador.layout.plantilla')

@section('contenido')
    <h1 class="mt-4">Crear Nuevo Proyecto</h1>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">{{Session::get('mensaje')}} </li>
        {{ Session::forget('mensaje') }}
    </ol>

{{--    @auth--}}
{{--        {{$num = auth()->user()->id}}--}}
{{--    @endauth--}}

    <form class="form-horizontal text-left" role="form" method="POST" action="{{ url('administrador/crearproyecto/'.$clienteid) }}">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
            <label for="nombre" class="control-label">Nombre</label>

            <div class="">
                <input id="nombre" type="string" class="form-control" name="nombre">

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
                <input id="descripcion" type="string" class="form-control" name="descripcion">

                @if ($errors->has('descripcion'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('stakeholder') ? ' has-error' : '' }}">
            <label for="stakeholder" class="control-label">Stakeholders</label>

            <div class="">
                {{--                <input id="epica" type="string" class="form-control" name="epica" >--}}
                <select name="stakeholder" id="stakeholder">
                    @foreach($stakeholders as $stakeholder)
                        @if($stakeholder->administrador == $usuario->id)
                        <option value="{{$stakeholder->id}}" >{{$stakeholder->id}}. {{$stakeholder->nombre}}</option>
                        @endif
                    @endforeach

                </select>

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
                {{--                <input id="epica" type="string" class="form-control" name="epica" >--}}
                <select name="equipo" id="equipo">
                    @foreach($equipos as $equipo)
                        @if($equipo->administrador == $usuario->id)
                        <option value="{{$equipo->id}}" >{{$equipo->id}}. {{$equipo->nombre}}</option>
                        @endif
                    @endforeach

                </select>

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
                <input id="estimacion" type="string" class="form-control" name="estimacion">

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
                <input id="estado" type="string" class="form-control" name="estado">

                @if ($errors->has('estado'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('estado') }}</strong>
                                    </span>
                @endif
            </div>
        </div>


        <button type="submit" class="btn btn-primary align-items-center">
            Register

        </button>
    </form>






@endsection
