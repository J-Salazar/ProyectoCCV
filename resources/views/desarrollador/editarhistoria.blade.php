@extends('desarrollador.layout.plantilla')

@section('contenido')

    <h1 class="mt-4">Editar Historia</h1>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">{{Session::get('mensaje')}} </li>
        {{ Session::forget('mensaje') }}
    </ol>


    <form class="form-horizontal text-left" role="form" method="POST" action="{{ url('/desarrollador/editarhistoria/'.$historiausuarioid ) }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('resumen') ? ' has-error' : '' }}">
            <label for="resumen" class="control-label">Resumen</label>

            <div class="">
                <input id="resumen" type="string" class="form-control" name="resumen" value="{{$historia->resumen}}">

                @if ($errors->has('resumen'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('resumen') }}</strong>
                                    </span>
                @endif
            </div>
        </div>


        <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
            <label for="descripcion" class="control-label">Nombre</label>

            <div class="">
                <input id="descripcion" type="string" class="form-control" name="descripcion" value="{{$historia->descripcion}}">

                @if ($errors->has('descripcion'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                @endif
            </div>
        </div>


        <div class="form-group{{ $errors->has('proyecto') ? ' has-error' : '' }}">
            <label for="usuario" class="control-label">Desarrollador</label>

            <div class="">
                <input id="usuario" type="string" class="form-control" name="usuario" value="{{$historia->usuario}}">

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
{{--                <input id="proyecto" type="string" class="form-control" name="proyecto" value="{{$historia->proyecto}}">--}}
                <select name="proyecto" id="proyecto">
                    @foreach($proyectos as $proyecto)
                        <option value="{{$proyecto->id}}" {{$historia->proyecto == $proyecto->id ? 'selected' : ''}}>{{$proyecto->id}}. {{$proyecto->nombre}}</option>
                    @endforeach

                </select>
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
                    <option value="alta" {{$historia->prioridad == 'alta' ? 'selected': ''}}>Alta</option>
                    <option value="media" {{$historia->prioridad == 'media' ? 'selected': ''}}>Media</option>
                    <option value="baja" {{$historia->prioridad == 'baja' ? 'selected': ''}}>Baja</option>

                </select>
                @if ($errors->has('prioridad'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('prioridad') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
            <label for="estado" class="control-label">Estado</label>

            <div class="">
                {{--                <input id="proyecto" type="select" class="form-control" name="proyecto" value="{{$epica->proyecto}}">--}}
                <select id="estado" name="estado">
                    <option value="pendiente" {{$historia->estado == 'pendiente' ? 'selected': ''}}>Pendiente</option>
                    <option value="en proceso" {{$historia->estado == 'en proceso' ? 'selected': ''}}>En proceso</option>
                    <option value="finalizado" {{$historia->estado == 'finalizado' ? 'selected': ''}}>Finalizado</option>

                </select>
                @if ($errors->has('estado'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('estado') }}</strong>
                                    </span>
                @endif
            </div>
        </div>


{{--        <div class="form-group{{ $errors->has('tiempoestimado') ? ' has-error' : '' }}">--}}
{{--            <label for="tiempoestimado" class="control-label">Tiempo estimado</label>--}}

{{--            <div class="">--}}
{{--                <input id="tiempoestimado" type="string" class="form-control" name="tiempoestimado" value="{{$historia->tiempoestimado}}">--}}

{{--                @if ($errors->has('tiempoestimado'))--}}
{{--                    <span class="help-block">--}}
{{--                                        <strong>{{ $errors->first('tiempoestimado') }}</strong>--}}
{{--                                    </span>--}}
{{--                @endif--}}
{{--            </div>--}}
{{--        </div>--}}


        <div class="form-group{{ $errors->has('epica') ? ' has-error' : '' }}">
            <label for="epica" class="control-label">Épica</label>

            <div class="">
{{--                <input id="epica" type="string" class="form-control" name="epica" value="{{$historia->epica}}">--}}
                <select name="epica" id="epica">
                    @foreach($epicas as $epica)
                        <option value="{{$epica->id}}" {{$historia->epica == $epica->id ? 'selected' : ''}}>{{$epica->id}}. {{$epica->nombre}}</option>
                    @endforeach

                </select>
                @if ($errors->has('epica'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('epica') }}</strong>
                                    </span>
                @endif
            </div>
        </div>






        <button type="submit" class="btn btn-primary align-items-center">
            Editar

        </button>
    </form>



@endsection
