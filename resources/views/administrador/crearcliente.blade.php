@extends('administrador.layout.plantilla')

@section('contenido')

    <h1 class="mt-4">Registrar Nuevo Cliente</h1>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">{{Session::get('mensaje')}} </li>
        {{ Session::forget('mensaje') }}
    </ol>


    <form class="form-horizontal text-left" role="form" method="POST" action="{{ url('/administrador/crearcliente/'.$id ) }}">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('razonsocial') ? ' has-error' : '' }}">
            <label for="razonsocial" class="control-label">Razon Social</label>

            <div class="">
                <input id="razonsocial" type="string" class="form-control" name="razonsocial">

                @if ($errors->has('razonsocial'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('razonsocial') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('representante') ? ' has-error' : '' }}">
            <label for="representante" class="control-label">Representante legal</label>

            <div class="">
                <input id="representante" type="string" class="form-control" name="representante">

                @if ($errors->has('replegal'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('representante') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('ruc') ? ' has-error' : '' }}">
            <label for="ruc" class="control-label">RUC</label>

            <div class="">
                <input id="ruc" type="string" class="form-control" name="ruc">

                @if ($errors->has('ruc'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('ruc') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('contacto') ? ' has-error' : '' }}">
            <label for="contacto" class="control-label">Contacto</label>

            <div class="">
                <input id="contacto" type="string" class="form-control" name="contacto">

                @if ($errors->has('contacto'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('contacto') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="control-label">Correo electronico</label>

            <div class="">
                <input id="email" type="string" class="form-control" name="email">

                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
            <label for="direccion" class="control-label">Direccion</label>

            <div class="">
                <input id="direccion" type="string" class="form-control" name="direccion">

                @if ($errors->has('direccion'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('stakeholder') ? ' has-error' : '' }}">
            <label for="stakeholder" class="control-label">Stakeholder</label>

            <div class="">
                <input id="stakeholder" type="string" class="form-control" name="stakeholder">

                @if ($errors->has('stakeholder'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('stakeholder') }}</strong>
                                    </span>
                @endif
            </div>
        </div>



        <button type="submit" class="btn btn-primary align-items-center">
            Crear

        </button>
    </form>



@endsection
