<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        //Los roles que va a tener mi pagina web
        $admin = Role::create(['name' => 'Admin']);
        $usuario = Role::create(['name' => 'Usuario']);
        $propietarioGrupo = Role::create(['name' => 'PropietarioGrupo']);


        Permission::create(['name' => 'admin.home'])->assignRole($admin);


        //Permisos para proteger las CATEGORIAS

        Permission::create(['name' => 'admin.categories.index'])->assignRole($admin);
        Permission::create(['name' => 'admin.categories.create'])->assignRole($admin);
        Permission::create(['name' => 'admin.categories.edit'])->assignRole($admin);
        Permission::create(['name' => 'admin.categories.destroy'])->assignRole($admin);





        //Permisos para proteger las PLATAFORMAS

        Permission::create(['name' => 'admin.plataforms.index'])->assignRole($admin);
        Permission::create(['name' => 'admin.plataforms.create'])->assignRole($admin);
        Permission::create(['name' => 'admin.plataforms.edit'])->assignRole($admin);
        Permission::create(['name' => 'admin.plataforms.destroy'])->assignRole($admin);



        //Permisos para proteger los grupos (unicamente lo tendran los usuarios dueños del grupo)

        //Permission::create(['name' => 'admin.groups.index']);
        Permission::create(['name' => 'admin.groups.create'])->assignRole($usuario);
        Permission::create(['name' => 'admin.groups.edit'])->assignRole($propietarioGrupo);
        Permission::create(['name' => 'admin.groups.destroy'])->assignRole($propietarioGrupo);

    }
}
