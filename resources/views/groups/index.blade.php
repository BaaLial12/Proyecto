<x-app-layout>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12 text-end">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('marketplace')}}">Marketplace</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{$plataforma}}</li>
                </ol>
              </nav>
            </div>
        </div>
        @if(count($grupos) > 0)

        <div class="row ">

            @foreach ($grupos as $grupo)
                {{-- Evitamos que se muestren los grupos de los usuarios logueados o los que sean propietarios --}}
                {{-- Para eso al ser relacion BelongsToMany no podemos usar el contains , usando el wherePivot puedo acceder a los datos de la tabla intermedia --}}
                {{-- Y luego con el count verificacion que haya algun registro que coincida con la "consulta" --}}
                @if($grupo->owner->id != Auth::user()->id && !$grupo->users()->wherePivot('user_id', Auth::user()->id)->count() )
                {{-- @if ($sitios_totales >= $grupo->users()->count()) --}}
                    <div class="col-lg-6 mb-4">
                        <div class="card">
                            <div class="card-body d-flex align-items-center">
                                <div class="col-3">
                                    @if ($grupo->owner->avatar)
                                        <img class="img-fluid rounded-circle"
                                            src="{{ $grupo->owner->avatar }}"
                                            alt="{{ $grupo->owner->name }}" />
                                    @elseif($grupo->owner->profile_photo_path)
                                        <img class="img-fluid rounded-circle  w-12"
                                            src="{{Storage::url($grupo->owner->profile_photo_path)}}" alt="{{ $grupo->owner->name }}" />

                                    @elseif (!$grupo->owner->avatar && !$grupo->owner->profile_photo_path)
                                    <img class="img-fluid rounded-circle"
                                            src="{{ $grupo->owner->profile_photo_url }}" alt="{{ $grupo->owner->name }}" />

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
                                    <p class="card-text mb-0">
                                        <strong>{{count($grupo->users) }}/{{ $grupo->capacidad }}</strong><small> Capacidad</small>
                                    </p>
                                </div>
                                <div class="col-3">
                                    <a class="btn btn-lg w-100" style="background-color: #72C3DC"
                                        href="{{ route('unirse-grupo', $grupo->id) }}">Únete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- @else
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
                @endif --}}
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
