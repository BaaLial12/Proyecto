<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;


    //Por defecto livewire usa taildwind pero yo quiero seguir usando bootstrap , que es lo que usa por defecto adminlt
    protected $paginationTheme = "bootstrap";


    //Esta variable me servira para buscar a un usuario
    public string $busqueda='';




    public function render()
    {
        $users = User::where('name' , 'like' , "%{$this->busqueda}%")->
                orWhere('email' , 'like' , "%{$this->busqueda}%")->paginate(10);
        return view('livewire.admin.user-index' , compact('users'));
    }


    public function updatingBusqueda(){
        $this->resetPage();
    }


}
