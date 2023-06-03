<x-app-layout>
    <div class="container">


        <div class="text-center">
            <h5 class="d-inline-block">PAGINA PRINCIPAL</h5>
        </div>



        <div class="row my-4">

            <div class="col-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-3">
                    Tus Suscripciones ({{ $contador }})
                </h2>
            </div>

            <div class="col-6">
                @livewire('create-group')
            </div>

        </div>


        <div class="row">
            @foreach ($grupos as $grupo)
                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                    <div class="card">
                        <img src="{{ Storage::url($grupo->plataform->logo) }}" alt="{{ $grupo->plataform->nombre }}"
                        class="card-img-top border-2 img-fluid" />
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
                                    <p class="card-text">Miembros:
                                        {{ count($grupo->users) }}/{{ $grupo->plataform->capacidad }}</p>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="block-subscribers">
                                            @foreach ($grupo->users as $user)
                                                <div class="block-subscribers__subscriber d-inline-block"
                                                    bis_skin_checked="1">
                                                    <div class="circle-subscriber">
                                                        @if ($user->avatar)
                                                            <img src="{{ $user->avatar }}"
                                                                class="rounded-circle" alt="{{ $user->name }}"
                                                                style="height: 3rem " data-bs-toggle="popover"
                                                                data-bs-trigger="hover focus" data-bs-placement="bottom"
                                                                data-bs-content="{{ $user->name }}">
                                                        @elseif($user->profile_photo_path)
                                                            <img src="{{ Storage::url($user->profile_photo_path) }}" class="rounded-circle "
                                                                alt="{{ $user->name }}" style="height: 3rem"
                                                                data-bs-toggle="popover" data-bs-trigger="hover focus"
                                                                data-bs-placement="bottom"
                                                                data-bs-content="{{ $user->name }}">

                                                        @elseif(!$user->avatar && !$user->profile_photo_path)
                                                            <img src="{{$user->profile_photo_url }}" class="rounded-circle "
                                                                alt="{{ $user->name }}" style="height: 3rem"
                                                                data-bs-toggle="popover" data-bs-trigger="hover focus"
                                                                data-bs-placement="bottom"
                                                                data-bs-content="{{ $user->name }}">

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



<style>
.card-img-top {
  max-height: 300px;
  min-height: 100px;
  object-fit: cover;
  height: 200px
}

.card{
    height:400px
}

</style>
