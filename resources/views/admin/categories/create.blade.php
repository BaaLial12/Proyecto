@extends('adminlte::page')
@section('title', 'Stream Share')
@section('content_header')
    <h1>Crear Categoria</h1>
@stop


@section('content')
    <div class="card">
        <div class="card-body">

            <form action="{{ route('admin.categories.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre"  id="nombre" class="form-control" placeholder="Nombre de la Categoria">
                    @error('nombre')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Crear Categoria</button>
            </form>
        </div>
    </div>
@stop
