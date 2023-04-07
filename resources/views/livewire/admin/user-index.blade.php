<div>
    {{-- The whole world belongs to you. --}}


    <div class="card">


        <div class="card-header">
            <input type="search" wire:model="busqueda" class="form-control" placeholder="Ingrese el nombre o correo de un usuario">
        </div>


        @if ($users->count())



        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>

                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th></th>

                    </thead>

                    <tbody>
                        @foreach ($users as $user )
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td style="width: 2vw">
                                        <a class="btn btn-primary" href="{{route('admin.users.edit' , $user)}}">Editar</a>
                                    </td>
                                </tr>
                        @endforeach

                    </tbody>


                </table>
              </div>
        </div>


        <div class="card-footer">
            {{$users->links()}}
        </div>

        @else

        <div class="card-body">
            <strong>NO HAY NINGUN REGISTRO</strong>
        </div>

        @endif


    </div>

</div>
