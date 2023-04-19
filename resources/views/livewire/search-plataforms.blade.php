<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}


    <div class="search-container position-relative pt-10">
        <input type="text" wire:model="search" placeholder="Buscar plataforma..."
            class="search-input form-control rounded ">
        @if ($search != '')
            <div class="card text-center mb-4 mx-auto mt-3">
                <div class="row">
                    @foreach ($plataforms as $plataforma)
                        <div class="col-lg-3 col-md-4 col-sm-12 mb-4">
                            <div class="card mb-4" style="background-color: #D8C3FF">
                                <div class="card-body">
                                    <h5 class="card-title" style="font-size: 1.5rem">
                                        <strong>{{ $plataforma->nombre }}</strong></h5>
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
        @endif
    </div>



</div>
