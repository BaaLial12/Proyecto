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

        //Comprobamos que la caapacidad que ha seleccionado es correcta
        if($capacidad_seleccionada > $capacidad_segun_plataform){
            return redirect()->route('dashboard')->with('error_msg', 'Estas introduciendo una capacidad no valida');
        }

        $user_id = Auth::user()->id;


        //Me traigo todos los ids de usuarios que estan compartiendo la plataforma a la que intentan ser admin
        $usuarios = Group::where('plataform_id' , $this->plataforma)->pluck('user_id')->toArray();

        //Me guardo en un array todas las plataform_id que tiene un usuario es decir DONDE SE UNE PERO NO ES ADMIN
        $plataforms_by_user = auth()->user()->groups()->pluck('plataform_id')->toArray();

        //Antes de crear hay que hacer una comprobacion previa para evitar que el usuario cree un grupo donde ya sea admin o pertenezca de la plataforma
        if(in_array(Auth::user()->id , $usuarios) || in_array($plataform_id, $plataforms_by_user) ){
            return redirect()->route('dashboard')->with('error_msg', 'Ya perteneces a un grupo de esa plataforma');
        }





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



}
