<x-app-layout>

    <div class="container">
        @livewire('search-plataforms')

        <div class="owl-carousel owl-theme mx-auto">
            <!-- Agregar clase "mx-auto" -->
            @foreach ($categorias as $categoria)
                <div class="card text-center mb-4 mx-auto ">
                    <!-- Agregar clase "text-center" y "mx-auto" -->
                    <div class="card-header" style="background-color: #5B5EA6">
                        <strong>{{ $categoria->nombre }}</strong><a
                            href="{{ route('show-plataforms-by-categorie', $categoria->nombre) }}"
                            class="float-right text-black">Ver Todo</a>
                    </div>
                    <div class="card-body text-center" style="background-color: #F9AFAF">
                        <div class="slider">
                            <div class="row">
                                {{-- Aqui basicamente lo que haremos sera recorrer la coleccion de objetos $plataformas , y filtramos los objetos que en la propiedad category_id coincidde con $categoria->id , pintando el nombre y el precio que le costaria al usuario en funcion de la gente que se puede unir a la plataforma --}}
                                @foreach ($plataformas->where('category_id', $categoria->id) as $plataforma)
                                    <div class="col-md-4">
                                        <div class="card mb-4" style="background-color: #D8C3FF">
                                            <div class="card-body">
                                                <h5 class="card-title" style="font-size: 1.5rem">
                                                    <strong>{{ $plataforma->nombre }}</strong>
                                                </h5>
                                                <p class="card-text" style="margin-top: 30px; font-size: 1.2rem">
                                                    Apartir de :
                                                    {{ round($plataforma->suscripcion / $plataforma->capacidad, 2) }}€
                                                </p>
                                                <a href="{{ route('groups.showGroups', $plataforma->nombre) }}"
                                                    class="btn btn-outline-dark" style="background-color: #00CDD0">Ver
                                                    grupos</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="row">
                <div class="d-flex justify-content-center mb-3">
                    <button type="button" class="btn btn-outline-dark" style="background-color: #00CDD0"
                        data-bs-toggle="modal" data-bs-target="#suferirServicio">
                        <i class="fa-regular fa-comment-dots fa-flip-horizontal"></i>Sugerir Servicio
                    </button>
                </div>
            </div>


            {{-- MODAL PARA SOLICITAR SERVICIO --}}

            <!-- Modal -->
            <div class="modal fade" id="suferirServicio" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <div class="d-flex justify-content-center">
                                    <span aria-hidden="true">&times;</span>
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
                            <form method="POST" name="formulario-servicio" action="{{ route('services.store') }}"
                                class="d-flex justify-content-center">
                                @csrf
                                <div class="container-fluid mt-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="nombre-servicio" class="form-label">Nombre del Servicio</label>
                                            <input type="text" name="nombre" id="nombre-servicio"
                                                class="form-control" placeholder="Ex: Service">
                                        </div>
                                        <div class="col-md-6 mt-2 mt-md-0">
                                            <label for="url-servicio" class="form-label">URL del Servicio</label>
                                            <input type="url" name="url" id="url-servicio" class="form-control"
                                                placeholder="Ex: http://www.service.com">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <label for="pagina-oferta" class="form-label">Página de la oferta</label>
                                            <input type="url" name="pagina" id="pagina-oferta" class="form-control"
                                                placeholder="Ex: http://www.service.com/offer">
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
                                            style="background-color: #00CDD0">Enviar</button>
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
