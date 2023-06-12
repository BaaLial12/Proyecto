<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

    {{-- SCRIPT NECESARIOS PARA CARROUSEL --}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    {{-- FIN SCRIPT NECESARIOS PARA CARROUSEL --}}

    <div class="container mt-2">
        <input type="text" wire:model="search" placeholder="Buscar plataforma..."
            class="search-input form-control rounded">
        @if ($search != '')
            <div class="card text-center mb-4 mx-auto mt-3 shadow-lg border-0">
                <div class="row">
                    @if (count($plataforms)>0)
                    @foreach ($plataforms as $plataforma)
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="card mb-4" style="background-color: #f0f0f0">
                            <div class="card-body">
                                <h5 class="card-title" style="font-size: 1.5rem">
                                    <strong>{{ $plataforma->nombre }}</strong>
                                </h5>
                                <p class="card-text" style="margin-top: 30px; font-size: 1.2rem">A
                                    partir de:
                                    {{ round($plataforma->suscripcion / $plataforma->capacidad, 2) }}€
                                </p>
                                <a href="{{ route('groups.showGroups', $plataforma->nombre) }}"
                                    class="btn btn-outline-dark" style="background-color: #72C3DC">Ver
                                    grupos</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="col text-center mt-2">
                        <div class="card shadow-lg border-0">
                            <div class="card-body py-5">
                                <div class="alert alert-info mt-4">
                                    <i class="fas fa-exclamation-triangle fa-lg"></i>Lamentablemente no disponemos de la plataforma que intentas buscar , ¿porque no nos envias una solicitud para agregarla?
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                </div>
            </div>


        @else
            @foreach ($categorias as $categoria)
                @if ($plataforms->where('category_id', $categoria->id)->count() > 0)
                    <div class="card text-center mb-4 mt-3 mx-auto border-0">
                        <!-- Agregar clase "text-center" y "mx-auto" -->
                        <div class="card-header border-0" style="background-color: #72C3DC">
                            <strong>{{ $categoria->nombre }}</strong><a
                                href="{{ route('show-plataforms-by-categorie', $categoria->nombre) }}"
                                class="float-right text-black">Ver Todo</a>
                        </div>

                        <div class="card-body text-center shadow-lg" style="background-color: #fff">
                            <div id="carouselExampleControls{{ $categoria->nombre }}" class="carousel slide">
                                <div class="carousel-inner">
                                    @foreach ($plataforms->where('category_id', $categoria->id)->chunk(3) as $chunk)
                                        <div class="carousel-item{{ $loop->first ? ' active' : '' }}">
                                            <div class="row">
                                                @foreach ($chunk as $plataforma)
                                                    <div class="col-md-4">
                                                        <div class="card mb-4" style="background-color: #f0f0f0">
                                                            <div class="card-body">
                                                                <h5 class="card-title" style="font-size: 1.5rem">
                                                                    <strong>{{ $plataforma->nombre }}</strong>
                                                                </h5>
                                                                <p class="card-text"
                                                                    style="margin-top: 30px; font-size: 1.2rem">
                                                                    A partir de:
                                                                    {{ round($plataforma->suscripcion / $plataforma->capacidad, 2) }}€
                                                                </p>
                                                                <a href="{{ route('groups.showGroups', $plataforma->nombre) }}"
                                                                    class="btn btn-outline-dark"
                                                                    style="background-color: #72C3DC">Ver grupos</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev"
                                    href="#carouselExampleControls{{ $categoria->nombre }}" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon d-none d-md-block" style="background-color: #72C3DC" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next"
                                    href="#carouselExampleControls{{ $categoria->nombre }}" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon d-none d-md-block" style="background-color: #72C3DC"  aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach


        @endif
    </div>
</div>
