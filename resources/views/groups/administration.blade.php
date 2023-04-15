<x-app-layout>

    {{-- <div class="container">

        <div class="row mt-3">

            <div class="col">

                <a class="btn btn-secondary" href="{{ route('dashboard') }}">
                    < Retroceder</a>

            </div>
        </div>


        <div class="row mt-3">

            <div class="col-12 border">
                <p>{{ $grupo->plataform->nombre }}</p>

            </div>



        </div>


        <div class="row">

            <div class="col-4">
                <p>{{$grupo->plataform->nombre}} 1 mes</p>
                <p>{{$grupo->plataform->suscripcion}}€</p>
            </div>

            <div class="col-4">
                <p>{{$grupo->plataform->nombre}}</p>
            </div>


            <div class="col-4">
                <p>Numero de Suscriptores</p>
                <p><strong style="color: blue">{{count($grupo->users)}}</strong>/{{$grupo->plataform->capacidad}}</p>
            </div>

        </div>


        <div class="row">

            <div class="row">
                <div class="col">
                    <p>Credenciales de {{$grupo->plataform->nombre}} </p>
                </div>


                <div class="row">

                    <div class="col-6">

                    </div>

                    <div class="col-6">

                    </div>

                </div>

            </div>


        </div>






    </div> --}}



    {{-- <div class="container">
        <div class="row mb-3">
            <div class="col">
                <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Back
                </a>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12 border rounded">
                <div class="d-flex justify-content-between align-items-center py-3 px-4">
                    <h1 class="h3">{{ $grupo->plataform->nombre }}</h1>
                    <span class="badge bg-primary">{{ count($grupo->users) }}/{{ $grupo->plataform->capacidad }}</span>
                </div>
                <div class="px-4 pb-4">
                    <p class="mb-0">{{ $grupo->plataform->descripcion }}</p>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="h4">{{ $grupo->plataform->nombre }} 1 Month</h2>
                        <p class="mb-0"><strong>{{ $grupo->plataform->suscripcion }}€</strong></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="h4">{{ $grupo->plataform->nombre }} Credenciales</h2>
                        <div class="mb-3">
                            <label class="form-label">Email:</label>
                            <input type="email" class="form-control" placeholder="Enter email" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password:</label>
                            <input type="password" class="form-control" placeholder="Enter password" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Back
                </a>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12 border rounded">
                <div class="d-flex justify-content-between align-items-center py-3 px-4">
                    <h1 class="h3">{{ $grupo->plataform->nombre }}</h1>
                    <span class="badge bg-primary">{{ count($grupo->users) }}/{{ $grupo->plataform->capacidad }}</span>
                </div>
                <div class="px-4 pb-4">
                    <p class="mb-0">{{ $grupo->plataform->descripcion }}</p>
                </div>
            </div>
        </div>


        <div class="row mb-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="h4">{{ $grupo->plataform->nombre }} 1 Month</h2>
                        <p class="mb-0"><strong>{{ $grupo->plataform->suscripcion }}€</strong></p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h2 class="h4">{{ $grupo->plataform->nombre }} Price per Subscriber</h2>
                        <p class="mb-0"><strong>{{round(($grupo->plataform->suscripcion)/($grupo->plataform->capacidad),2)}}€</strong></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="h4">{{ $grupo->plataform->nombre }} Credenciales</h2>
                        <div class="mb-3">
                            <label class="form-label">Email:</label>
                            <input type="email" class="form-control" placeholder="Enter email" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password:</label>
                            <input type="password" class="form-control" placeholder="Enter password" />
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>





</x-app-layout>
