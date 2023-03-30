<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //



        Category::create([
            'nombre' => 'SVOD'
        ]);

        Category::create([
            'nombre' => 'Música'
        ]);

        Category::create([
            'nombre' => 'Seguridad'
        ]);


        Category::create([
            'nombre' => 'Videojuegos'
        ]);


       








    }
}
