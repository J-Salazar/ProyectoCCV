@extends('desarrollador.layout.plantilla')

@section('contenido')
    <h1 class="mt-4">Crear Nueva Épica</h1>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">{{Session::get('mensaje')}} </li>
        {{ Session::forget('mensaje') }}
    </ol>

{{--    @auth--}}
{{--        {{$num = auth()->user()->id}}--}}
{{--    @endauth--}}

    <form class="form-horizontal text-left" role="form" method="POST" action="{{ url('desarrollador/crearepica/'.$desarrolladorid) }}">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('proyecto') ? ' has-error' : '' }}">
            <label for="proyecto" class="control-label">Proyecto</label>

            <div class="">
{{--                <input id="proyecto" type="string" class="form-control" name="proyecto">--}}
                <select name="proyecto" id="proyecto">
                    @foreach($proyectos as $proyecto)
                        <option value="{{$proyecto->id}}" >{{$proyecto->id}}. {{$proyecto->nombre}}</option>
                    @endforeach

                </select>
                @if ($errors->has('proyecto'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('proyecto') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

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

        <div class="form-group{{ $errors->has('resumen') ? ' has-error' : '' }}">
            <label for="resumen" class="control-label">Resumen</label>

            <div class="">
                <textarea id="resumen" type="string" class="form-control" name="resumen"></textarea>

                @if ($errors->has('resumen'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('resumen') }}</strong>
                                    </span>
                @endif
            </div>
        </div>



        <button type="submit" class="btn btn-primary align-items-center">
            Crear

        </button>
    </form>






@endsection
