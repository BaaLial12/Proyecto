<div>
    {{-- The Master doesn't talk, he acts. --}}

    <button class="badge rounded-pill" style="background: #00CDD0" data-bs-toggle="modal" data-bs-target="#createGroup">
        <i class="fas fa-add"></i> Crear Grupo
    </button>

    <div class="modal fade z-1" id="createGroup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="3"
        aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
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
                            <p>Crear Grupo</p>
                        </div>
                    </div>
                    <div class="row bg-danger">
                        <div class="col m-3">
                            <p>Analizamos cada servicio para verificar si cumple con los requisitos y está
                                disponible para compartir. Envíanos la información a continuación.</p>
                        </div>
                    </div>
                    <form method="POST" name="formulario-create" action="" class="d-flex justify-content-center">
                        @csrf
                        <div class="container-fluid mt-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="nombre-servicio" class="form-label">Nombre del Servicio</label>
                                    <select class="form-select" wire:model="plataforma">
                                        <option value="">Selecciona una</option>
                                        @foreach ($plataforms as $plataform)
                                            <option value="{{ $plataform->id }}">{{ $plataform->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="nombre-servicio" class="form-label">Sitios disponibles</label>
                                    <select id="capacidades" name="capacidades" wire:model="capacidad">
                                        @for ($i = 1; $i <= $capacidad; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
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







</div>
