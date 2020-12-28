@extends('administrador.layout.plantilla')

@section('contenido')

    <h1 class="mt-4">Editar Stakeholder</h1>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">{{Session::get('mensaje')}} </li>
        {{ Session::forget('mensaje') }}
    </ol>


    <form class="form-horizontal text-left" role="form" method="POST" action="{{ url('/administrador/editarstakeholder/'.$stakeholderid ) }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
            <label for="nombre" class="control-label">Nombre</label>

            <div class="">
                <input id="nombre" type="string" class="form-control" name="nombre" value="{{$stakeholder->nombre}}">

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
                <input id="apellido" type="string" class="form-control" name="apellido" value="{{$stakeholder->apellido}}">

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
                <input id="email" type="email" class="form-control" name="email" value="{{$stakeholder->email}}">

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
                {{--                <input id="proyecto" type="string" class="form-control" name="proyecto" value="{{$epica->proyecto}}">--}}
                <select name="proyecto" id="proyecto">
                    @foreach($proyectos as $proyecto)
                        <option value="{{$proyecto->id}}" {{$stakeholder->proyecto == $proyecto->id ? 'selected' : ''}}>{{$proyecto->id}}. {{$proyecto->nombre}}</option>
                    @endforeach

                </select>

                @if ($errors->has('proyecto'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('proyecto') }}</strong>
                                    </span>
                @endif
            </div>
        </div>




        <button type="submit" class="btn btn-primary align-items-center">
            Editar

        </button>
    </form>



@endsection
