<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="search-container position-relative pt-10">
        <input type="text" wire:model="search" placeholder="Buscar plataforma..." class="search-input form-control rounded ">
        @if ($search !== '')
          <ul class="platforms-list list-group position-absolute w-100 mt-1 ">
            @foreach ($platforms as $platform)
              <a class="platform-item list-group-item-action list-group-item-danger cursor-pointer">{{ $platform->nombre }}</a>
            @endforeach
          </ul>
        @endif
      </div>



</div>
