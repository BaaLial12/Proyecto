<?php

namespace App\Http\Livewire;

use App\Models\Plataform;
use Livewire\Component;
use Livewire\WithPagination;

class CreateGroup extends Component
{

    use WithPagination;



    public $selectedPlataform = null;
    public $capacities = [];

    public function render()
    {
        $plataforms = Plataform::all();

        return view('livewire.create-group', compact('plataforms'));
    }

    public function updatedSelectedPlataform($plataformId)
    {
        if (!empty($plataformId)) {
            $plataform = Plataform::find($plataformId);

            $this->capacities = explode(',', $plataform->capacidad);
        } else {
            $this->capacities = [];
        }

        $this->dispatchBrowserEvent('plataformChanged', $this->capacities);
    }






    // public function updatingPlataform(){
    //     $this->resetPage();
    // }

    // public function updatedPlataform($plataform_id){
    //     $this->capacidad = Plataform::where('id' , $plataform_id)->pluck('capacidad');
    // }


}
