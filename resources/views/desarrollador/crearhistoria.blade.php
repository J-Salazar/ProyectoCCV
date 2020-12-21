@extends('desarrollador.layout.plantilla')

@section('contenido')

    <h1 class="mt-4">Crear Historia</h1>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">{{Session::get('mensaje')}} </li>
        {{ Session::forget('mensaje') }}
    </ol>


    <form class="form-horizontal text-left" role="form" method="POST" action="{{ url('/desarrollador/crearhistoria/'.$desarrolladorid ) }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('resumen') ? ' has-error' : '' }}">
            <label for="resumen" class="control-label">Resumen</label>

            <div class="">
                <input id="resumen" type="string" class="form-control" name="resumen" >

                @if ($errors->has('resumen'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('resumen') }}</strong>
                                    </span>
                @endif
            </div>
        </div>


        <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
            <label for="descripcion" class="control-label">Descripcion</label>

            <div class="">
                <input id="descripcion" type="string" class="form-control" name="descripcion" >

                @if ($errors->has('descripcion'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                @endif
            </div>
        </div>


        <div class="form-group{{ $errors->has('proyecto') ? ' has-error' : '' }}">
            <label for="usuario" class="control-label">Usuario</label>

            <div class="">
                <input id="usuario" type="string" class="form-control" name="usuario" >

                @if ($errors->has('usuario'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('usuario') }}</strong>
                                    </span>
                @endif
            </div>
        </div>


        <div class="form-group{{ $errors->has('proyecto') ? ' has-error' : '' }}">
            <label for="proyecto" class="control-label">Proyecto</label>

            <div class="">
                <input id="proyecto" type="string" class="form-control" name="proyecto" >

                @if ($errors->has('proyecto'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('proyecto') }}</strong>
                                    </span>
                @endif
            </div>
        </div>


        <div class="form-group{{ $errors->has('prioridad') ? ' has-error' : '' }}">
            <label for="prioridad" class="control-label">Prioridad</label>

            <div class="">
                {{--                <input id="proyecto" type="select" class="form-control" name="proyecto" value="{{$epica->proyecto}}">--}}
                <select id="prioridad" name="prioridad">
                    <option value="alta">Alta</option>
                    <option value="media">Media</option>
                    <option value="baja">Baja</option>

                </select>
                @if ($errors->has('prioridad'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('prioridad') }}</strong>
                                    </span>
                @endif
            </div>
        </div>


        <div class="form-group{{ $errors->has('tiempoestimado') ? ' has-error' : '' }}">
            <label for="tiempoestimado" class="control-label">Tiempo estimado</label>

            <div class="">
                <input id="tiempoestimado" type="string" class="form-control" name="tiempoestimado" >

                @if ($errors->has('tiempoestimado'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('tiempoestimado') }}</strong>
                                    </span>
                @endif
            </div>
        </div>


        <div class="form-group{{ $errors->has('epica') ? ' has-error' : '' }}">
            <label for="epica" class="control-label">Épica</label>

            <div class="">
                <input id="epica" type="string" class="form-control" name="epica" >

                @if ($errors->has('epica'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('epica') }}</strong>
                                    </span>
                @endif
            </div>
        </div>






        <button type="submit" class="btn btn-primary align-items-center">
            Crear

        </button>
    </form>



@endsection
