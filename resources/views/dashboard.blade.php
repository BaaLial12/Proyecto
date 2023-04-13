<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Tus Suscripciones ({{$contador}})
        </h2>


        <div class="row">

            @foreach ($grupos as $grupo )

            <div class="col-6">

                <div class="card card-frame">
                    <div class="card-header">
                        <img class="img-fluid img-thumbnail" src="{{$grupo->plataform->logo}}" alt="{{$grupo->plataform->nombre}}">
                        <div class="row">
                                <div class="col-3">
                                    {{$grupo->plataform->nombre}}
                                </div>
                                <div class="col-3">
                                    {{count($grupo->users)}}/{{$grupo->plataform->capacidad}}
                                </div>
                        </div>

                    </div>
                    <div class="card-body">
                        {{$grupo}}
                    </div>

                    <div class="card-footer">
                        {{$grupo}}
                    </div>


                </div>
                @endforeach

            </div>



        </div>







        <a class="btn btn-primary" href="{{route('groups.create')}}">
            <i class="fas fa-add">Crear Grupo</i>
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            </div>
        </div>
    </div>
</x-app-layout>
