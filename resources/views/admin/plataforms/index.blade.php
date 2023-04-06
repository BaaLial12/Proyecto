@extends('adminlte::page')
@section('title', 'Stream Share')

@section('content_header')
    <h1>Mostrar listado de Plataformas</h1>
@stop

@section('content')


<div class="card">
    <div class="card-header">
        <a class="btn btn-success" href="{{route('admin.plataforms.create')}}">Crear Plataforma</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Logo</th>
                    <th>Capacidad</th>
                    <th>Precio Mensual</th>
                    <th>Categoria</th>
                    <th colspan="2"></th>
                </tr>
            </thead>


            <tbody>
                @foreach ($plataformas as $item )
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->nombre}}</td>
                        <td><img class="img-fluid" src="{{ url($item->logo) }}" /></td>
                        <td>{{$item->capacidad}}</td>
                        <td>{{$item->suscripcion}}€</td>
                        <td>{{$item->category->nombre}}</td>
                        <td width="10px">
                            <a class="btn btn-primary" href="{{route('admin.plataforms.edit' , $item)}}">Editar</a>
                        </td>
                        <td width="10px">
                            <form action="{{route('admin.plataforms.destroy' , $item)}}" method="POST">
                                @method('DELETE')
                                @csrf

                                <button type="submit" class="btn btn-danger">Eliminar</button>


                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>



        </table>
    </div>
</div>


@stop

