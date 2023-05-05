<x-app-layout>
    <div class="container">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-3">
            Tus Suscripciones ({{ $contador }})
        </h2>

        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach ($grupos as $grupo)
                <div class="col mb-3">
                    <div class="card h-100">
                        <img src="{{ Storage::url($grupo->plataform->logo) }}" alt="{{ $grupo->plataform->nombre }}"
                            class="card-img-top border-2" alt="{{ $grupo->plataform->nombre }}" />
                            <div class="row card-body align-items-center text-center">
                                <div class="col col-md-3 col-lg-6 ">
                                    <h5 class="card-title my-0">{{ $grupo->plataform->nombre }}</h5>
                                </div>
                                <div class="col col-md-8 col-lg-6 ">
                                    <p class="card-text">
                                        Precio por miembro :
                                        {{ round($grupo->plataform->suscripcion / $grupo->plataform->capacidad, 2) }}€
                                    </p>
                                </div>
                            </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-5">
                                    <p class="card-text">Miembros: {{ count($grupo->users) }}/{{ $grupo->plataform->capacidad }}</p>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="block-subscribers">
                                            @foreach($grupo->users as $user)
                                            <div class="block-subscribers__subscriber d-inline-block" bis_skin_checked="1">
                                                <div class="circle-subscriber">
                                                    @if (!$user->avatar)
                                                    <img src="{{ $user->profile_photo_url}}" class="rounded-circle" alt="{{ $user->name }}" style="height: 3rem " data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="bottom" data-bs-content="{{ $user->name }}">
                                                    @else
                                                    <img src="{{ $user->avatar}}" class="rounded-circle " alt="{{ $user->name }}" style="height: 3rem" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="bottom" data-bs-content="{{ $user->name }}">
                                                    @endif
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col align-content-center text-center">
                                    <a class="btn btn-outline-dark" style="background-color: #72C3DC"
                                        href="{{ route('groups.administration', $grupo->id) }}">Administrar
                                        Suscripción</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>





    </div>







    {{--
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            </div>
        </div>
    </div> --}}
</x-app-layout>


<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {},
        Tawk_LoadStart = new Date();
    (function() {
        var s1 = document.createElement("script"),
            s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/644123b94247f20fefeccc1a/1guf773ll';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
<!--End of Tawk.to Script-->


<script>
const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
</script>
