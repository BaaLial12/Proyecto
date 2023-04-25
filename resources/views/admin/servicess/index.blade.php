@extends('adminlte::page')
@section('title', 'Stream Share')


@section('content_header')


@stop


@section('content')
{{-- TODO:MODIFICAR PARA QUE SEA EN FORMATO TABLA ES MAS UTIL QUE CARD --}}
<div class="row">
    @foreach($services as $service)
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0">{{ $service->nombre }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text"><strong>Página web:</strong> {{ $service->url_service }}</p>
                    <p class="card-text"><strong>Oferta URL:</strong> {{ $service->url_offer }}</p>
                    <p class="card-text"><strong>Categoría:</strong> {{ $service->category->nombre }}</p>
                </div>
                <div class="card-footer">
                    <button class="btn btn-success me-2">Aprobar</button>
                    <button class="btn btn-danger">Rechazar</button>
                </div>
            </div>
        </div>
    @endforeach
</div>


@endsection


@section('footer')
    <strong>Copyright © 2023 <a href="#">David Ureña</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block" bis_skin_checked="1">
        <b>Version</b> 3.2.0
    </div>

@endsection
