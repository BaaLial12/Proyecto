<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

    <head>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <div class="container">
        <input type="text" wire:model="search" placeholder="Buscar plataforma..."
            class="search-input form-control rounded ">
        @if ($search != '')
            <div class="card text-center mb-4 mx-auto mt-3">
                <div class="row">
                    @foreach ($plataforms as $plataforma)
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="card mb-4" style="background-color: #D8C3FF">
                                <div class="card-body">
                                    <h5 class="card-title" style="font-size: 1.5rem">
                                        <strong>{{ $plataforma->nombre }}</strong>
                                    </h5>
                                    <p class="card-text" style="margin-top: 30px; font-size: 1.2rem">A
                                        partir de:
                                        {{ round($plataforma->suscripcion / $plataforma->capacidad, 2) }}€
                                    </p>
                                    <a href="{{ route('groups.showGroups', $plataforma->id) }}"
                                        class="btn btn-outline-dark" style="background-color: #00CDD0">Ver
                                        grupos</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        @else
            @foreach ($categorias as $categoria)
                <div class="card text-center mb-4 mx-auto ">
                    <!-- Agregar clase "text-center" y "mx-auto" -->
                    <div class="card-header" style="background-color: #5B5EA6">
                        <strong>{{ $categoria->nombre }}</strong><a
                            href="{{ route('show-plataforms-by-categorie', $categoria->nombre) }}"
                            class="float-right text-black">Ver Todo</a>
                    </div>


                    <div class="card-body text-center" style="background-color: #F9AFAF">
                        <div id="carouselExampleControls{{$categoria->nombre}}" class="carousel slide">
                            <div class="carousel-inner">
                                @foreach ($plataforms->where('category_id', $categoria->id)->chunk(3) as $chunk)
                                <div class="carousel-item{{ $loop->first ? ' active' : '' }}">
                                    <div class="row">
                                        @foreach ($chunk as $plataforma)
                                        <div class="col-md-4">
                                            <div class="card mb-4" style="background-color: #D8C3FF">
                                                <div class="card-body">
                                                    <h5 class="card-title" style="font-size: 1.5rem">
                                                        <strong>{{ $plataforma->nombre }}</strong>
                                                    </h5>
                                                    <p class="card-text" style="margin-top: 30px; font-size: 1.2rem">
                                                        A partir de:
                                                        {{ round($plataforma->suscripcion / $plataforma->capacidad, 2) }}€
                                                    </p>
                                                    <a href="{{ route('groups.showGroups', $plataforma->nombre) }}" class="btn btn-outline-dark" style="background-color: #00CDD0">Ver grupos</a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls{{$categoria->nombre}}" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls{{$categoria->nombre}}" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>


                </div>
            @endforeach

        @endif
    </div>



</div>
