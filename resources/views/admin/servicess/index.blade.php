@extends('adminlte::page')
@section('title', 'Stream Share')


@section('content_header')


@stop


@section('content')
    {{-- TODO:MODIFICAR PARA QUE SEA EN FORMATO TABLA ES MAS UTIL QUE CARD --}}

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr class="bg-gradient-gray-dark text-white text-sm leading-normal">
                    <th>Nombre</th>
                    <th>Página web</th>
                    <th>Oferta URL</th>
                    <th>Categoría</th>
                    <th>Aprobar</th>
                    <th>Rechazar</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 font-light">
                @foreach ($services as $service)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6">{{ $service->nombre }}</td>
                        <td class="py-3 px-6">{{ $service->url_service }}</td>
                        <td class="py-3 px-6">{{ $service->url_offer }}</td>
                        <td class="py-3 px-6">{{ $service->category->nombre }}</td>
                        <td class="py-3 px-6">
                            <x-adminlte-button theme="success" label="Aprobar" data-toggle="modal"
                                data-target="#modalMin{{ $service->nombre }}" />

                            @if (count($services) > 0)
                                {{-- Minimal --}}
                                <x-adminlte-modal id="modalMin{{ $service->nombre }}"
                                    title="Rellena los datos de : {{ $service->nombre }}">
                                    <form action="{{ route('admin.plataforms.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="container-fluid mt-4">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="nombre" class="form-label">Nombre del servicio</label>
                                                        <input type="text" class="form-control form-floating"
                                                            name="nombre" id="nombre" value="{{ $service->nombre }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-2 mt-md-0">
                                                    <div class="form-group mb-3">
                                                        <label for="descripcion" class="form-label">Descripcion del
                                                            servicio</label>
                                                        <input type="text" class="form-control form-floating"
                                                            name="descripcion" id="descripcion">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mt-2">
                                                    <div class="form-group mb-3">
                                                        <label for="suscripcion" class="form-label">Precio de la
                                                            servicio</label>
                                                        <input type="number" name="suscripcion" id="suscripcion"
                                                            step="0.01" class="form-control form-floating">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <div class="form-group mb-3">
                                                        <label for="capacidad" class="form-label">Capacidad del
                                                            servicio</label>
                                                        <input type="number" name="capacidad" id="capacidad" step="1"
                                                            class="form-control form-floating">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mt-2">
                                                    <div class="form-group mb-3">
                                                        <label for="categoria" class="form-label">Categoria del
                                                            servicio</label>
                                                        <select name="categoria" id="categoria"
                                                            class="form-select form-floating">
                                                            @foreach ($categorias as $categoria)
                                                                <option value="{{ $categoria->id }}"
                                                                    {{ $service->category->nombre == $categoria->nombre ? 'selected' : '' }}>
                                                                    {{ $categoria->nombre }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <div class="form-group mb-3">
                                                        <label for="imagen" class="form-label">Imagen del servicio</label>
                                                        <input type="file" name="imagen" id="imagen"
                                                            class="form-control-file" accept="image/png"
                                                            onchange="previsualizarImagen(event)">
                                                        <img id="imagen-previa" src="#"
                                                            alt="Vista previa de la imagen"
                                                            style="display: none; max-width: 200px; max-height: 200px; margin-top: 10px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                            <button type="submit" class="btn btn-outline-dark mx-auto"
                                                style="background-color: #00CDD0">Enviar</button>

                                    </form>



                                </x-adminlte-modal>
                            @endif


                        </td>
                        <td class="py-3 px-6">
                            <form action="{{ route('admin.services.destroy', $service) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" class="text-white">
                                    <i class="fas fa-trash text-white"></i>Rechazar
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>








@endsection



@section('footer')
    <strong>Copyright © 2023 <a href="#">David Ureña</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block" bis_skin_checked="1">
        <b>Version</b> 3.2.0
    </div>
@endsection


@section('plugins.Sweetalert2', true);
{{-- Test Sweetalert2 Plugin --}}
@push('js')
    <script>
        @if (session('error_msg'))
            let timerInterval
            Swal.fire({
                icon: 'error',
                title: '{{ session('error_msg') }}',
                position: 'top-end',
                timer: 2000,
                timerProgressBar: true,
                toast: true,
                showConfirmButton: false,
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer')
                }
            })
        @endif

        @if (session('success_msg'))
            let timerInterval
            Swal.fire({
                icon: 'success',
                title: '{{ session('success_msg') }}',
                position: 'top-end',
                timer: 2000,
                timerProgressBar: true,
                toast: true,
                showConfirmButton: false,
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer')
                }
            })
        @endif
    </script>

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
@endpush
