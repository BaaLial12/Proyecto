<?php

namespace App\Http\Controllers;

use App\Models\Credential;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CredentialController extends Controller
{
    //



    public function update(Request $request)
    {
        //Primero lo que hacemos es obtener el modelo de Group que corresponde al ID que hemos mandado
        //Basicamente traernos toda la informacion del grupo
        $grupo = Group::find($request->grupo);

        //Me guardo el id del usuario
        $user = Auth::user()->id;

        //Me guardo el id del usuario al que esta asignado el grupo
        $group_id = $grupo->user_id;

        //Si el id del usuario logueado es distinto al usuario propietario que recargue
        if(!$user == $group_id){
            return Redirect::back();
        }
        //Luego nos traemos todos los datos que estan asociados a las credenciales a traves de la relacion que hay en group
        $credential = $grupo->credential;

        //Actualizamos los campos de credential con lo que mandamos por los campos
        $credential->email = $request->email;
        $credential->password = $request->password;


        //Actualizamos
        $credential->update();


        //Y recargamos la pagina
        return Redirect::back()->with('success_msg', 'Credenciales Actualizada');
    }
}
