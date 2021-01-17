@extends('administrador.layout.plantilla')

@section('contenido')
    <h1 class="mt-4">Crear Stakeholder</h1>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">{{Session::get('mensaje')}} </li>
        {{ Session::forget('mensaje') }}
    </ol>

    {{--    @auth--}}
    {{--        {{$num = auth()->user()->id}}--}}
    {{--    @endauth--}}

    <form class="form-horizontal text-left" role="form" method="POST" action="{{ url('administrador/crearstakeholder') }}">
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

        <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
            <label for="apellido" class="control-label">Apellido</label>

            <div class="">
                <input id="apellido" type="string" class="form-control" name="apellido">

                @if ($errors->has('apellido'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('apellido') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="control-label">Email</label>

            <div class="">
                <input id="email" type="email" class="form-control" name="email">

                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('proyecto') ? ' has-error' : '' }}">
            <label for="proyecto" class="control-label">Proyecto</label>

            <div class="">
                {{--                <input id="epica" type="string" class="form-control" name="epica" >--}}
                <select name="proyecto" id="proyecto">
                    @foreach($proyectos as $proyecto)
                        <option value="{{$proyecto->id}}" >{{$proyecto->id}}. {{$proyecto->nombre}}</option>
                    @endforeach

                    <option value=" " selected >No asiganado</option>

                </select>

                @if ($errors->has('proyecto'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('proyecto') }}</strong>
                                    </span>
                @endif
            </div>
        </div>




        <button type="submit" class="btn btn-primary align-items-center">
            Crear

        </button>
    </form>






@endsection
