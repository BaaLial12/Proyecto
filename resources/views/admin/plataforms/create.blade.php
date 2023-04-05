@extends('adminlte::page')
@section('title', 'Stream Share')

@section('content_header')
    <h1>Crear Plataforma</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">


            <x-form action="{{ route('admin.plataforms.store') }}" method="POST" enctype="multipart/form-data">
                <x-form-input name="nombre" label="Nombre" placeholder="Nombre de la Plataforma" />
                <x-form-textarea name="Descripcion" label="Descripcion"
                    placeholder="Escribe una descripcion para la plataforma" />
                <x-form-input type="number" name="capacidad" label="Capacidad" placeholder="Capacidad de la Plataforma" />
                <x-form-input type="number" name="suscripcion" label="Suscripcion"
                    placeholder="Suscripcion de la Plataforma" />
                <x-form-select name="Categoria" :options="$categorias" label="Categoria" />




                <button type="submit" class="btn btn-success">
                    <i class="fas fa-new"></i>Crear
                </button>



                <a href="{{ route('admin.home') }}" class="btn btn-danger">
                    <i class="fas fa-back"></i>Volver
                </a>

            </x-form>

        </div>

    </div>



@stop
