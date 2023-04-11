<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}


    <input type="text" wire:model="search" placeholder="Buscar plataforma...">
    <ul>
        @foreach ($platforms as $platform)
            <li>{{ $platform->nombre }}</li>
        @endforeach
    </ul>



</div>
