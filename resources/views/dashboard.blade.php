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
                        <div class="card-body">
                            <h5 class="card-title">{{ $grupo->plataform->nombre }}</h5>
                            <p class="card-text">
                                Precio por miembro :
                                {{ round($grupo->plataform->suscripcion / $grupo->plataform->capacidad, 2) }}€
                            </p>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col">
                                    <p class="card-text">Miembros :
                                        {{ count($grupo->users) }}/{{ $grupo->plataform->capacidad }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col align-content-center text-center">
                                    <a class="btn btn-outline-dark" style="background-color: #00CDD0"
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
