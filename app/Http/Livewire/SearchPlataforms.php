<?php

namespace App\Http\Livewire;

use App\Models\Plataform;
use Livewire\Component;

class SearchPlataforms extends Component
{


    public $search = '';


    public function render()
    {

        $plataforms = Plataform::where('nombre', 'LIKE', '%' . $this->search . '%')
            ->get();



        return view('livewire.search-plataforms'  , compact('plataforms'));
    }
}
