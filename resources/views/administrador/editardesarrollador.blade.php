@extends('administrador.layout.plantilla')

@section('contenido')

    <h1 class="mt-4">Editar Desarrollador </h1>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">{{Session::get('mensaje')}} </li>
        {{ Session::forget('mensaje') }}
    </ol>

    {{--    @auth--}}
    {{--        {{$num = auth()->user()->id}}--}}
    {{--    @endauth--}}


    <form class="form-horizontal text-left" role="form" method="POST" action="{{url('/administrador/editardesarrollador/'.$desarrollador->id)}}">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
            <label for="nombre" class="control-label">Nombre</label>

            <div class="">
                <input id="nombre" type="string" class="form-control" name="nombre" value="{{$desarrollador->nombre}}">

                @if ($errors->has('nombre'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
            <label for="apellido" class="control-label">Apellido</label>

            <div class="">
                <input id="apellido" type="string" class="form-control" name="apellido" value="{{$desarrollador->apellido}}">

                @if ($errors->has('apellido'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('apellido') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('stakeholder') ? ' has-error' : '' }}">
            <label for="email" class="control-label">Email</label>

            <div class="">
                <input id="email" type="string" class="form-control" name="email" value="{{$desarrollador->email}}">

                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('equipo') ? ' has-error' : '' }}">
            <label for="equipo" class="control-label">Equipo</label>

            <div class="">
                <input id="equipo" type="string" class="form-control" name="equipo" value="{{$desarrollador->equipo}}">

                @if ($errors->has('equipo'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('equipo') }}</strong>
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
