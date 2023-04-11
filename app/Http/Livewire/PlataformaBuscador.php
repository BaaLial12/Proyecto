<?php

namespace App\Http\Livewire;

use App\Models\Plataform;
use Livewire\Component;

class PlataformaBuscador extends Component
{



    public $search = '';
    public $platforms = [];


    public function render()
    {

        $this->platforms= Plataform::where('nombre' , 'LIKE' , $this->search)
                            ->get();


        return view('livewire.plataforma-buscador');
    }
}
