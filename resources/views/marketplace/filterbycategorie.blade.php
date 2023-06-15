<x-app-layout>



    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12 text-end">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('marketplace')}}">Marketplace</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{$nombre}}</li>
                </ol>
              </nav>
            </div>
        </div>
            <div class="card text-center mb-4 mx-auto mt-3 shadow-lg border-0">
                <div class="row">
                    @foreach ($plataforms_by_categorie as $plataforma)
                        @if ($plataforma->category_id == $categoria_id)
                        <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="card mb-4" style="background-color: #f0f0f0">
                                    <div class="card-body">
                                        <h5 class="card-title" style="font-size: 1.5rem">
                                            <strong>{{ $plataforma->nombre }}</strong>
                                        </h5>
                                        <p class="card-text" style="margin-top: 30px; font-size: 1.2rem">
                                            Apartir de :
                                            {{ round($plataforma->suscripcion / $plataforma->capacidad, 2) }}€
                                        </p>
                                        <a href="{{ route('groups.showGroups', $plataforma->nombre) }}"
                                            class="btn btn-outline-dark" style="background-color: #72C3DC">Ver
                                            grupos</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <style>
                .card {
                    min-height: 300px;
                    height: auto;
                    width: 100%;
                }


                .card-body {
                    height: 100%;
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                }
            </style>



    </div>





    {{-- TODO: FALTARIA PONERLO BONITO CON SU CARD(QUE SERA IGUAL ) --}}









</x-app-layout>
