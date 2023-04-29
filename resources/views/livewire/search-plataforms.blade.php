<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}


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
                                    <p class="card-text" style="margin-top: 30px; font-size: 1.2rem">A partir de:
                                        {{ round($plataforma->suscripcion / $plataforma->capacidad, 2) }}€</p>
                                    <a href="{{ route('groups.showGroups', $plataforma->id) }}"
                                        class="btn btn-outline-dark" style="background-color: #00CDD0">Ver grupos</a>
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
                <div class="slider">
                    <div class="row">
                        {{-- Aqui basicamente lo que haremos sera recorrer la coleccion de objetos $plataformas , y filtramos los objetos que en la propiedad category_id coincidde con $categoria->id , pintando el nombre y el precio que le costaria al usuario en funcion de la gente que se puede unir a la plataforma --}}
                        @foreach ($plataforms->where('category_id', $categoria->id) as $plataforma)
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

        @endif
    </div>



</div>
