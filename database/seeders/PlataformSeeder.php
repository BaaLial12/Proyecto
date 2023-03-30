<?php

namespace Database\Seeders;

use App\Models\Plataform;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PlataformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //




        Plataform::create([
            'nombre' => 'Netflix',
            'logo'=> 'xxx',
            'capacidad' => '3',
            'suscripcion' => '18.99',
            'descripcion' => 'Disfruta de Netflix, películas y series en streaming en tu smart TV, consola, PC, Mac, móvil, tablet y más dispositivos.',
            'category_id' => '1'
        ]);

        Plataform::create([
            'nombre' => 'Spotify',
            'logo'=> 'xxx',
            'capacidad' => '3',
            'suscripcion' => '40',
            'descripcion' => 'xxxx',
            'category_id' => '2'
        ]);


        Plataform::create([
            'nombre' => 'NordVPN',
            'logo'=> Storage::url('/public/plataformas/hola.png'), //MODIFICAR
            'capacidad' => '3',
            'suscripcion' => '50',
            'descripcion' => 'Navega de forma segura, en todas las circunstancias. Las tecnologías de vanguardia utilizadas por NordVPN sirven como escudos contra piratas informáticos u otro malware, también te protegen cuando usas redes públicas de Wi-Fi e incluso bloquean anuncios molestos.',
            'category_id' => '3'
        ]);


        Plataform::create([
            'nombre' => 'Nintendo Switch',
            'logo'=> 'xxx',
            'capacidad' => '3',
            'suscripcion' => '60',
            'descripcion' => 'Disfruta del juego en línea, mantiene automáticamente tus datos guardados en línea, usa la aplicación para smartphone y obtiene ofertas exclusivas solo para suscriptores.',
            'category_id' => '4'
        ]);




    }
}
