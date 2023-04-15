<x-app-layout>


    <div class="container">
        <div class="row">
          @foreach ($grupos as $grupo)
            @if ($sitios_totales > count($grupo->users))
              <div class="col-lg-6 mb-4">
                <div class="card">
                  <div class="card-body d-flex align-items-center">
                    <div class="col-3">
                        <img src="{{$grupo->users}}" alt="Avatar de usuario" class="img-fluid">
                    </div>
                    <div class="col-6">
                      <h5 class="card-title mb-0">{{ $grupo->owner->name }}</h5>
                      <p class="card-text mb-0">Esta compartiendo <strong>{{ $grupo->plataform->nombre }}</strong></p>
                      <p class="card-text mb-0"><strong>{{ round($grupo->plataform->suscripcion / $grupo->plataform->capacidad, 2) }}€</strong><small>/Mes</small></p>
                    </div>
                    <div class="col-3">
                      <a class="btn btn-primary" href="{{route('unirse-grupo' , $grupo->id)}}">Únete</a>
                    </div>
                  </div>
                </div>
              </div>
            @endif
          @endforeach
        </div>
      </div>








</x-app-layout>
