<?php

namespace App\Http\Livewire;

use App\Models\Group;
use App\Models\Plataform;
use Illuminate\Support\Facades\Auth;
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


    public function crearGrupo(){

        $plataform_id = $this->plataforma;
        $capacidad_seleccionada = $this->capacidad;

        $ids_plataform = Plataform::all()->pluck('id')->toArray();
        $capacidad_segun_plataform =  Plataform::where('id', $this->plataforma)->pluck('capacidad')->first();

        $user_id = Auth::user()->id;
        // dd($plataform_id , $capacidad_seleccionada , $ids_plataform , $capacidad_segun_plataform);

        //Antes de crear hay que hacer una comprobacion previa para evitar que el usuario cree un grupo donde ya sea admin o ppertenenza a el




        $grupo =Group::create([
            'capacidad' => $capacidad_seleccionada,
            'plataform_id' => $plataform_id,
            'user_id' => $user_id,
        ]);


        //Al crearlo me creo en un campo en la tabla intermedia para que empiece a reflejarse el usuario ya como miembro
        $grupo->users()->attach($user_id);

        //Y recargamos la pagina
        return redirect()->route('dashboard')->with('success_msg', 'Grupo Creado');


    }












    // public function updatingPlataform(){
    //     $this->resetPage();
    // }

    // public function updatedPlataform($plataform_id){
    //     $this->capacidad = Plataform::where('id' , $plataform_id)->pluck('capacidad');
    // }


}
