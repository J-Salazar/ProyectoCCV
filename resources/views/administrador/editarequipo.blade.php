@extends('administrador.layout.plantilla')

@section('contenido')

    <h1 class="mt-4">Editar Equipo </h1>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">{{Session::get('mensaje')}} </li>
        {{ Session::forget('mensaje') }}
    </ol>

    {{--    @auth--}}
    {{--        {{$num = auth()->user()->id}}--}}
    {{--    @endauth--}}


    <form class="form-horizontal text-left" role="form" method="POST" action="{{url('/administrador/editarequipo/'.$equipo->id)}}">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
            <label for="nombre" class="control-label">Nombre</label>

            <div class="">
                <input id="nombre" type="string" class="form-control" name="nombre" value="{{$equipo->nombre}}">

                @if ($errors->has('nombre'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('lider') ? ' has-error' : '' }}">
            <label for="lider" class="control-label">Lider de equipo</label>

            <div class="">
                <input id="lider" type="string" class="form-control" name="lider" value="{{$equipo->lider}}">

                @if ($errors->has('lider'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('lider') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('desarrollador') ? ' has-error' : '' }}">
            <label for="desarrollador" class="control-label">Desarrollador</label>

            <div class="">
                <input id="desarrollador" type="string" class="form-control" name="desarrollador" value="{{$equipo->desarrollador}}">

                @if ($errors->has('desarrollador'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('desarrollador') }}</strong>
                                    </span>
                @endif
            </div>
        </div>


        <button type="submit" class="btn btn-primary align-items-center">
            Guardar

        </button>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active "> </li>
        </ol>

    </form>







@endsection
