<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Plataform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function showGroups($plataforma)
    {


        //A traves de pluck me cojo el id de la plataforma
        $plataform_id = Plataform::where('nombre' , $plataforma)->pluck('id')->first();

        //Comprobacion que el id exista , sino lo mandamos al mismo sitio
        if(!$plataform_id){
            return redirect()->route('marketplace');

        }


        //Con esto lo que hago es traerme todos los grupos que tienen de plataform_id la variable arriba creada y ademas cuento los usuarios
        $grupos = Group::where('plataform_id',  $plataform_id)->withCount('users')->get();

        //Me guardo en una variable los sitios totales(capacidad) de cada plataforma
        $sitios_totales = Plataform::where('nombre' , $plataforma)->pluck('capacidad')->first();


        return view('groups.index', compact('grupos', 'plataform_id' , 'sitios_totales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //Me guardo el id del usuario que esta logueado
        $user_id = Auth::user()->id;

        //Me guardo en una variable todas las ids de grupos
        $groups_ids = Group::all()->pluck('id')->toArray();

        //Me guardo en una variable todas las ids de grupo que pertenecen al usuario logueado
        $groups_ids_user = Group::where('user_id' , $user_id)->pluck('id')->toArray();


        //Comprobamos que exista el id del grupo en todos los ids de grupos
        if(!in_array($group->id , $groups_ids)){
            return redirect()->route('dashboard')->with('error_msg', 'No puedes borrar algo que no existe ;( ');
        }

        //Si existe , comprobamos que le pertenenca al usuario logueado el group_id
        if(!in_array($group->id , $groups_ids_user)){
            return redirect()->route('dashboard')->with('error_msg', 'No eres propietario del grupo ');
        }

        //Si sale de todo esto significa , existe el grupo , el id del grupo pertenece al usuario logueado en forma de admin

        $group->delete();
        return redirect()->route('dashboard')->with('success_msg', 'Grupo eliminado');

    }




    public function administration($group)
    {


        //Con find lo que hacemos es buscar un registro por su id , en la tabla group y devuelve el modelo asociado a ese registro
        $grupo = Group::find($group);



        // $usuario_pro = Auth::user()->id;


        // if($usuario_pro!=$group->user_id){
        // } else{
        //     return view('dashboard');

        // }


        return view('groups.administration', compact('grupo'));
    }


    public function joinGroup($id)
    {
        // $grupo = Group::find($id);

        // $user = Auth::user();
        // //Vamos a verificar si el usuario ya esta en ese grupo o en un uno donde se comparta la misma plataform

        // if ($grupo->users->contains($user)) {
        //     return redirect()->route('dashboard')->with('warning', 'Ya estás en este grupo.');
        //     dd("primero");
        // }

        // dd('salida');
        // // Verificar si el grupo está lleno
        // if ($grupo->users->count() >= $grupo->sitios_totales) {
        //     return redirect()->route('dashboard')->with('warning', 'Lo sentimos, este grupo ya está lleno.');
        //     dd('segundo');
        // }
        // dd('salida segundo');


        // // $grupo->users()->attach($user->id);

        // // $user->groups()->attach($grupo->id);
        // // $grupo->users()->attach($user);
        // $grupo->users()->syncWithoutDetaching($user->id);


        // return redirect()->route('dashboard')->with('success', 'Te has unido al grupo exitosamente.');

        $user = Auth::user()->id;
        $grupo = Group::find($id);

        //Primera comprobacion , que exista el grupo
        if(!Group::where('id' , $id)->exists()){
            return redirect()->route('dashboard')->with('error_msg', 'Lo sentimos, este grupo no existe.');
        }

        //Segunda comprobacion que el usuario no se intente unir a un grupo que ya es miembro
        if($grupo->users->contains($user)){
            return redirect()->route('dashboard')->with('error_msg', 'Ya perteneces a este grupo.');
        }

        dd($grupo->plataform->id);

        if ($grupo->plataform->id) {
        }
        $users = $grupo->users;



        $belongsToGroup = $grupo->users->contains($user);




        //Me guarda el id del propietario
        $propUser = $grupo->id;





        // //Que se intente unir a su mismo grupo
        if($grupo->user_id == $user){
            return redirect()->route('dashboard')->with('warning', 'Te has intentado unir a tu grupo.');
        }

        //Que ya este en el grupo

        if ($grupo->user_id) {
            return redirect()->route('dashboard')->with('warning', 'Ya estás en este grupo.');
        }

        if ($grupo->users()->count() >= $grupo->sitios_totales) {
            return redirect()->route('dashboard')->with('warning', 'Lo sentimos, este grupo ya está lleno.');
        }

        // Si llega aquí, el usuario puede unirse al grupo
        $grupo->users()->attach($user);

        return redirect()->route('dashboard')->with('success', 'Te has unido al grupo exitosamente!');
    }
}
