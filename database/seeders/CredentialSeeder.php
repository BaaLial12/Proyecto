<?php

namespace Database\Seeders;

use App\Models\Credential;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CredentialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //


        Credential::create([
            'id' => 1,
            'email' => 'asdasdasdasd@gmail.com',
            'password' => 'saasddasdas',
        ]);



    }
}
