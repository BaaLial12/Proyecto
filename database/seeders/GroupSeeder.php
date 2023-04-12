<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Plataform;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //



        $user = User::all()->random();

        $group = Group::create([

            'capacidad' => 90,
            'plataform_id' => '1' ,
            'user_id' => $user->id
        ]);

        $group->users()->attach($user);
        


    }
}
