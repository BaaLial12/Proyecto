<x-app-layout>

    {{--TODO: FALTARIA PONERLO BONITO CON SU CARD(QUE SERA IGUAL ) --}}
    @foreach ($plataforms_by_categorie as $plataforma)
        @if ($plataforma->category_id == $categoria_id)
        <div>{{ $plataforma }}</div>

        @endif
    @endforeach

</x-app-layout>
