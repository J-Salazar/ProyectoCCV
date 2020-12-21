@extends('desarrollador.layout.plantilla')

@section('contenido')

    <h1 class="mt-4">Editar Épica</h1>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">{{Session::get('mensaje')}} </li>
        {{ Session::forget('mensaje') }}
    </ol>


    <form class="form-horizontal text-left" role="form" method="POST" action="{{ url('/desarrollador/editarepica/'.$epicaid ) }}">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('proyecto') ? ' has-error' : '' }}">
            <label for="proyecto" class="control-label">Proyecto</label>

            <div class="">
                <input id="proyecto" type="string" class="form-control" name="proyecto" value="{{$epica->proyecto}}">

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
                <input id="nombre" type="string" class="form-control" name="nombre" value="{{$epica->nombre}}">

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
                <input id="resumen" type="string" class="form-control" name="resumen" value="{{$epica->resumen}}">

                @if ($errors->has('resumen'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('resumen') }}</strong>
                                    </span>
                @endif
            </div>
        </div>




        <button type="submit" class="btn btn-primary align-items-center">
            Editar

        </button>
    </form>



@endsection
