<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Tus Suscripciones ({{$contador}})
        </h2>

        @foreach ($grupos as $grupo )
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
              <div class="card">
                <img src="{{$grupo->plataform->logo}}" alt="{{$grupo->plataform->nombre}}" class="card-img-top border-2"
                  alt="Hollywood Sign on The Hill" />
                <div class="card-body">
                  <h5 class="card-title">{{$grupo->plataform->nombre}}</h5>
                  <p class="card-text">
                    Precio por miembro : {{($grupo->plataform->suscripcion)/($grupo->plataform->capacidad)}}€
                  </p>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                            <p class="card-text">Miembros : {{count($grupo->users)}}/{{$grupo->plataform->capacidad}}</p>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col align-content-center text-center">
                            <a class="btn btn-secondary" href="{{('')}}">Administrar Suscripcion</a>
                        </div>
                    </div>
            </div>
              </div>
            </div>
        </div>
        @endforeach








    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            </div>
        </div>
    </div>
</x-app-layout>
