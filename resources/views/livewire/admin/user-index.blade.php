<div>
    {{-- The whole world belongs to you. --}}


    <div class="card">


        <div class="card-header">
            <input type="search" wire:model="busqueda" class="form-control"
                placeholder="Ingrese el nombre o correo de un usuario">
        </div>


        @if ($users->count())



            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>

                            <tr class="bg-gradient-gray-dark text-white text-sm leading-normal">
                                <th class="py-3 px-6 text-left">ID</th>
                                <th class="py-3 px-6 text-left">Nombre</th>
                                <th class="py-3 px-6 text-left">Email</th>
                                <th class="py-3 px-6 text-left">Ultima vez</th>
                                <th class="py-3 px-6 text-center">Status</th>
                                <th class="py-3 px-6 text-center">Acciones</th>
                            </tr>

                        </thead>

                        <tbody class="text-gray-600 font-light">
                            @foreach ($users as $user)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6">{{ $user->id }}</td>
                                    <td class="py-3 px-6">{{ $user->name }}</td>
                                    <td class="py-3 px-6">{{ $user->email }}</td>
                                    <td class="py-3 px-6">{{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}
                                    </td>
                                    <td class="py-3 px-6 text-center">

                                        @if ($user->last_seen >= now()->subSeconds(30))
                                            <span class="badge badge-pill badge-success py-1 px-3  text-lg">
                                                Online
                                            </span>
                                        @else
                                            <span class="badge badge-pill badge-danger py-1 px-3 text-lg">
                                                Offline
                                            </span>
                                        @endif


                                    </td>
                                    <td class="py-3 px-6 text-center" style="width: 2vw" >
                                        <a class="btn btn-primary"
                                            href="{{ route('admin.users.edit', $user) }}">Editar</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>


                    </table>
                </div>
            </div>


            <div class="card-footer">
                {{ $users->links() }}
            </div>
        @else
            <div class="card-body">
                <strong>NO HAY NINGUN REGISTRO</strong>
            </div>

        @endif


    </div>

</div>
