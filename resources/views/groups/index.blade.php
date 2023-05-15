<x-app-layout>
    <div class="container">
        @if(count($grupos) > 0)
        <div class="row ">
            @foreach ($grupos as $grupo)
                @if ($sitios_totales >= count($grupo->users))
                    <div class="col-lg-6 mb-4">
                        <div class="card">
                            <div class="card-body d-flex align-items-center">
                                <div class="col-3">
                                    @if (!$grupo->owner->avatar)
                                        <img src="{{ $grupo->owner->profile_photo_url }}" alt="Avatar de usuario"
                                            class="img-fluid rounded-circle">
                                    @else
                                        <img src="{{ $grupo->owner->avatar }}" alt="Avatar de usuario"
                                            class="img-fluid rounded-circle">
                                    @endif

                                </div>
                                <div class="col-6">
                                    <h5 class="card-title mb-0"> <strong>{{ strtoupper($grupo->owner->name) }} </strong>
                                    </h5>
                                    <p class="card-text mb-0">Esta compartiendo
                                        <strong>{{ strtoupper($grupo->plataform->nombre) }}</strong>
                                    </p>
                                    <p class="card-text mb-0">
                                        <strong>{{ round($grupo->plataform->suscripcion / $grupo->plataform->capacidad, 2) }}€</strong><small>/Mes</small>
                                    </p>
                                </div>
                                <div class="col-3">
                                    <a class="btn btn-lg w-100" style="background-color: #72C3DC"
                                        href="{{ route('unirse-grupo', $grupo->id) }}">Únete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col text-center mt-2">
                        <div class="card shadow-lg border-0">
                            <div class="card-body py-5">
                                <div class="alert alert-info mt-4">
                                    <i class="fas fa-exclamation-triangle fa-lg"></i>Todos los grupos de esta plataforma estan llenos , ¿Quieres crearlo tu?
                                        @livewire('create-group')
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        @else
        <div class="col text-center mt-2">
            <div class="card shadow-lg border-0">
                <div class="card-body py-5">
                    <div class="alert alert-info mt-4">
                        <i class="fas fa-exclamation-triangle fa-lg"></i>Nadie esta compartiendo esta plataforma...  ¿Te apuntas tu?
                            @livewire('create-group')
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    
</x-app-layout>
