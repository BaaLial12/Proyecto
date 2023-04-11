<x-app-layout>
    Hola
    {{$id->nombre}}

    @foreach ($grupos as $grupo )
            {{$grupo->capacidad}}
    @endforeach
    {{-- {{$grupos[0]}} --}}




</x-app-layout>
