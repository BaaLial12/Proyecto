<x-app-layout>




    <div class="container">


        @livewire('search-plataforms')
        <div class="mx-auto">
            <!-- Agregar clase "mx-auto" -->
            <div class="row">
                <div class="d-flex justify-content-center mb-3">
                    <button type="button" class="btn btn-outline-dark" style="background-color: #72C3DC"
                        data-bs-toggle="modal" data-bs-target="#suferirServicio">
                        <i class="fa-regular fa-comment-dots fa-flip-horizontal"></i> Sugerir Servicio
                    </button>
                </div>
            </div>
        </div>
        {{-- SI PETA HAY QUE QUITAR EL DIV DE ARRIBA --}}


        {{-- MODAL PARA SOLICITAR SERVICIO --}}

        <!-- Modal -->
        <div class="modal fade" id="suferirServicio" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <div class="d-flex justify-content-center">
                            </div>
                        </button>
                    </div>
                    <div class="modal-body p-3 text-center" style="height: 400px; overflow: auto;">
                        <div class="row" id="chatModalLabel">
                            <div class="col">
                                <p>Sugerir un servicio</p>
                            </div>
                        </div>
                        <div class="row bg-danger">
                            <div class="col m-3">
                                <p>Analizamos cada servicio para verificar si cumple con los requisitos y está
                                    disponible para compartir. Envíanos la información a continuación.</p>
                            </div>
                        </div>
                        <form method="POST" name="formulario-servicio" action="{{ route('admin.services.create') }}"
                            class="d-flex justify-content-center">
                            @csrf
                            <div class="container-fluid mt-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="nombre-servicio" class="form-label">Nombre del Servicio</label>
                                        <input type="text" name="nombre" id="nombre-servicio" class="form-control"
                                            placeholder="Ex: Service" required>
                                    </div>
                                    <div class="col-md-6 mt-2 mt-md-0">
                                        <label for="url-servicio" class="form-label">URL del Servicio</label>
                                        <input type="url" name="url" id="url-servicio" class="form-control"
                                            placeholder="Ex: http://www.service.com" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="pagina-oferta" class="form-label">Página de la oferta</label>
                                        <input type="url" name="pagina" id="pagina-oferta" class="form-control"
                                            placeholder="Ex: http://www.service.com/offer" required>
                                    </div>
                                    <div class="col-md-6 mt-2 mt-md-0">
                                        <label for="categoria" class="form-label">Categoría</label>
                                        <select class="form-select" name="categoria" id="categoria">
                                            @foreach ($categorias as $categoria)
                                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                            {{-- <div class="d-flex flex-column align-items-start justify-content-start">
                                </div> --}}

                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col">
                                <div class="input-group">
                                    <button type="submit" class="btn btn-outline-dark mx-auto"
                                        style="background-color: #72C3DC">Enviar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>

                {{-- FIN MODAL SERVICIO --}}

            </div>



        </div>

        <style>
            .card {
                min-height: 300px;
            }

            .owl-carousel .owl-item .card {
                height: auto;
                width: 100%;
            }

            .owl-carousel .owl-item .card-body {
                height: 100%;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }
        </style>








</x-app-layout>
