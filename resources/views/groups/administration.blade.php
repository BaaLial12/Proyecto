<x-app-layout>

    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <a href="{{ route('dashboard') }}" class="btn btn-outline-dark" style="background-color: #00CDD0">
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
                        <p class="mb-0">
                            <strong>{{ round($grupo->plataform->suscripcion / $grupo->plataform->capacidad, 2) }}€</strong>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="h4">{{ $grupo->plataform->nombre }} Credenciales</h2>
                        <div class="mb-3">
                            <label class="form-label">Email:</label>
                            <input type="password" id="email-input" class="form-control" placeholder="Enter email"
                                value="{{ $grupo->credential->email }}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password:</label>
                            <input id="password-input" type="password" class="form-control" placeholder="Enter password"
                                value="{{ $grupo->credential->password }}" />
                        </div>

                        <div class="row text-center">
                            <div class="col">
                                <div class="mb-3 align-items-center">
                                    <button id="show-credentials-btn" class="btn btn-outline-dark"
                                        style="background-color: #00CDD0" type="button">Mostrar credenciales</button>
                                </div>
                            </div>
                            @if ($grupo->user_id == Auth::user()->id)
                                <div class="col">
                                    <div class="mb-3 align-items-center">
                                        <button id="show-password-btn" class="btn btn-outline-dark"
                                            style="background-color: #00CDD0" data-bs-toggle="modal"
                                            data-bs-target="#modal-edit-credentials" type="button">Actualizar
                                            credenciales</button>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3 ">
            <div class="col">
                <div class="row border rounded" style="background-color: #291b44">
                    <div class="col">
                        <div class="row m-3" style="background-color: #3e3157">
                            <div class="row text-center">
                                <p class="text-white">Tu suscripcion de {{ $grupo->plataform->nombre }} te sale a
                                    {{ round($grupo->plataform->suscripcion / $grupo->plataform->capacidad, 2) }}€ en
                                    lugar de
                                    {{ $grupo->plataform->suscripcion }}€/mes.</p>
                                <p class="text-white">Asi que te ahorras
                                    {{ round($grupo->plataform->suscripcion - round($grupo->plataform->suscripcion / $grupo->plataform->capacidad, 2), 2) }}
                                    €/mes!</p>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        @foreach ($grupo->users as $user)
                            <div class="col-4 d-inline-block" bis_skin_checked="1">
                                <div class="d-flex justify-content-center align-items-center">
                                    @if (!$user->avatar)
                                        <img src="{{ $user->profile_photo_url }}" class="rounded-circle"
                                            alt="{{ $user->name }}" style="height: 3rem " data-bs-toggle="popover"
                                            data-bs-trigger="hover focus" data-bs-placement="bottom"
                                            data-bs-content="{{ $user->name }}">
                                    @else
                                        <img src="{{ $user->avatar }}" class="rounded-circle "
                                            alt="{{ $user->name }}" style="height: 3rem" data-bs-toggle="popover"
                                            data-bs-trigger="focus" data-bs-placement="bottom" role="button"
                                            data-bs-content="{{ $user->name }}">
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="row mt-4 mb-3">
                        <div class="col-12 d-flex justify-content-center ">
                            {{-- <button type="button" class="btn btn-outline-dark" style="background-color: #00CDD0"
                                data-toggle="modal" data-target="#chatModal">
                                <i class="fa-regular fa-comment-dots fa-flip-horizontal"></i>Mensaje al grupo
                            </button> --}}
                            <button type="button" class="btn btn-outline-dark" style="background-color: #00CDD0"
                                data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <i class="fa-regular fa-comment-dots fa-flip-horizontal"></i>Mensaje al grupo
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        @if ($grupo->user_id == Auth::user()->id)
            {{-- Falta ocultar el boton para que solo el admin del grupo pueda verlo   --}}
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card">
                        <div class="row card-body align-items-center">
                            <div class="col-6 ">
                                <p class="text-danger mr-auto mb-0">Eliminar Grupo</p>
                            </div>
                            <div class="col-6 text-center">
                                <form action="{{ route('groups.destroy', $grupo->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger text-danger mr-auto">Eliminar
                                        {{ $grupo->plataform->nombre }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            {{-- Esto sera para los usuarios(SOLAMENTE) , para salir del grupo FALTA CREAR FUNCION PARA SALIR DEL GRUPO --}}
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card">
                        <div class="row card-body align-items-center">
                            <div class="col-6 ">
                                <p class="text-danger mr-auto mb-0">Abandonar Grupo</p>
                            </div>
                            <div class="col-6 text-center">
                                <form action="{{ route('groups.destroy', $grupo->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger text-danger mr-auto">Abandonar
                                        {{ $grupo->plataform->nombre }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif


    </div>


    {{-- PARA MOSTRAR Y OCULTAR LAS CREDENCIALES --}}
    <script>
        const passwordInput = document.getElementById("password-input");
        const emailInput = document.getElementById("email-input");
        const showPasswordBtn = document.getElementById("show-credentials-btn");

        showPasswordBtn.addEventListener("click", () => {
            if (passwordInput.type === "password") {
                emailInput.type = "email";
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
                emailInput.type = "password";

            }
        });
    </script>

    {{-- COSAS PARA EL POPOVER --}}
    <script>
        const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
        const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
    </script>

    <script>
        const popover = new bootstrap.Popover('.popover-dismiss', {
            trigger: 'focus'
        })
    </script>


    {{-- MODAL PARA CAMBIAR LAS CREDENCIALES --}}
    <!-- Modal -->

    <div class="modal fade" id="modal-edit-credentials" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">INTRODUCE LAS CREDENCIALES DE
                        {{ $grupo->plataform->nombre }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('credential-update') }}" method="GET">
                        @method('PUT')
                        @csrf
                        <label class="form-label">Email:</label>
                        <input type="text" id="email-modal" class="form-control" placeholder="Enter email"
                            value="{{ $grupo->credential->email }}" name="email" />

                        <label class="form-label">Password:</label>
                        <input id="password-modal" type="text" class="form-control" placeholder="Enter password"
                            value="{{ $grupo->credential->password }}" name="password" />
                        <input type="text" hidden value="{{ $grupo->id }}" name="grupo">

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger text-danger"
                                data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-outline-dark" style="background-color: #00CDD0">
                                <i class="fas fa-save"></i>Almacenar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- FIN MODAL CREDENCIALES --}}


    {{-- MODAL PARA EL CHAT --}}

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="chatModalLabel">Chat del grupo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <div class="d-flex justify-content-center">
                            <span aria-hidden="true">&times;</span>
                        </div>
                    </button>
                </div>
                <div class="modal-body p-3" style="height: 400px; overflow: auto;">
                    <div class="d-flex flex-column align-items-start justify-content-start">
                        @foreach ($messages as $message)
                            <div class="chat-message{{ $message->user_id == Auth::id() ? ' ms-auto' : '' }}">
                                <div class="chat-message-content bg-light rounded py-2 px-3 mb-2">
                                    <div class="small text-muted">{{ $message->created_at->format('h:i A') }}</div>
                                    <div class="text-muted">{{ $message->user->name }}</div>
                                    <div class="text">{{ $message->message }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="{{ route('messages.store', $grupo->id) }}">
                        @csrf
                        <input type="hidden" name="group_id" value="{{ $grupo->id }}">
                        <div class="input-group">
                            <input type="text" name="message" class="form-control"
                                placeholder="Escribe un mensaje">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- FIN MODAL CHAT --}}


    {{-- SCRIPT PARA BAJAR EL SCROLL AUTOMATICAMENTE AL FINAL --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modal = document.getElementById('staticBackdrop');
            modal.addEventListener('shown.bs.modal', function() {
                var messagesContainer = modal.querySelector('.modal-body');
                messagesContainer.scrollTop = messagesContainer.scrollHeight;
            });
        });
    </script>






</x-app-layout>
