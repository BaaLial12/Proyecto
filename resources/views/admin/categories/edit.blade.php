@extends('adminlte::page')
@section('title', 'Stream Share')

@section('content_header')
    <h1>Editar Categoria</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <form action="{{ route('admin.categories.update',$category) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre de la Categoria" value="{{$category->nombre}}">
                    @error('nombre')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Actualizar Categoria</button>
            </form>

        </div>
    </div>
@stop
