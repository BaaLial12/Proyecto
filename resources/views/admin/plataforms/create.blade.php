@extends('adminlte::page')
@section('title', 'Stream Share')

@section('content_header')
    <h1>Crear Plataforma</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            {!! Form::open(['route' => 'admin.plataforms.store' , 'files' => true]) !!}

            <div class="form-group d-flex flex-column">
                {!! Form::label('nombre', 'Nombre') !!}
                {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la Categoria']) !!}

                @error('nombre')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group d-flex flex-column">
                {!! Form::label('descripcion', 'Descripción') !!}
                {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Descripción de la Categoria']) !!}

                @error('descripcion')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group d-flex flex-column">
                {!! Form::label('capacidad', 'Capacidad') !!}
                {!! Form::number('capacidad', null, ['class' => 'form-control', 'placeholder' => 'Capacidad de la Plataforma']) !!}

                @error('capacidad')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group d-flex flex-column">
                {!! Form::label('suscripcion', 'Suscripción') !!}
                {!! Form::number('suscripcion', null, ['class' => 'form-control', 'placeholder' => 'Precio mensual de la Suscripcion' , 'step' => '0.01']) !!}

                @error('suscripcion')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group d-flex flex-column">
                {!! Form::label('categoria', 'Categoría') !!}
                {!! Form::select('categoria', $categorias, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una categoría']) !!}

                @error('categoria')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group d-flex flex-column">
                {!! Form::label('imagen', 'Imagen (PNG)') !!}
                {!! Form::file('imagen', ['class' => 'form-control-file', 'accept' => 'image/png', 'onchange' => 'previsualizarImagen(event)' ]) !!}
                <img id="imagen-previa" src="#" alt="Vista previa de la imagen" style="display: none; max-width: 400px; max-height: 400px; margin-top: 10px;">
                @error('imagen')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            {!! Form::submit('Crear Plataforma', ['class' => 'btn btn-success']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop


{{-- SCRIPT PARA PREVISUALIZAR LA IMAGEN --}}
<script>
    function previsualizarImagen(event) {
        var input = event.target;
        var reader = new FileReader();

        reader.onload = function() {
            var img = document.getElementById("imagen-previa");
            img.src = reader.result;
            img.style.display = "block";
        }

        reader.readAsDataURL(input.files[0]);
    }
</script>


{{-- Necesito decidir si quedarme esto o ponerlo normal que es responsive --}}

<style>


@media screen and (min-width: 768px) {
    .form-group {
        flex-direction: row;
        align-items: center;
    }

    .form-group label {
        flex-basis: 30%;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
        flex-basis: 70%;
    }
}
</style>
