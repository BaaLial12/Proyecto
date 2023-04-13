<x-app-layout>
    Hola
    {{$id->nombre}}

    @foreach ($grupos as $grupo )
    {{$grupo->owner->name}}
            <p>Capacidad del grupo {{$sitios_totales}}</p>
            <p> Usuarios en grupo {{count($grupo->users)}}</p>
    @endforeach
</x-app-layout>
