@extends('adminlte::page')
@section('title', 'Stream Share')

@section('content_header')
    <h1>Editar Categoria</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            
            {!! Form::model($category , ['route' => ['admin.categories.update' , $category], 'method' => 'put']) !!}

            <div class="form-group">
                {!! Form::label('nombre', 'Nombre') !!}
                {!! Form::text('nombre', null, ['class' => 'form-control' , 'placeholder' => 'Nombre de la Categoria']) !!}

                @error('nombre')
                    <span class="text-danger">{{$message}}</span>
                @enderror


            </div>

            {!! Form::submit('Actualizar Categoria', ['class' => 'btn btn-success']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop
