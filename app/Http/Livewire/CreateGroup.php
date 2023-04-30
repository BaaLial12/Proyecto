<?php

namespace App\Http\Livewire;

use App\Models\Plataform;
use Livewire\Component;

class CreateGroup extends Component
{




    // public $selectedPlataform = null;
    // public $capacidades = [];
    public $plataforma = '';

    public $capacidad = null;



    public function render()
    {
        $plataforms = Plataform::all();




        return view('livewire.create-group', compact('plataforms'));
    }


    public function updatedPlataforma()
    {
        $this->capacidad = Plataform::where('id', $this->plataforma)->pluck('capacidad')->first();
    }












    // public function updatingPlataform(){
    //     $this->resetPage();
    // }

    // public function updatedPlataform($plataform_id){
    //     $this->capacidad = Plataform::where('id' , $plataform_id)->pluck('capacidad');
    // }


}
