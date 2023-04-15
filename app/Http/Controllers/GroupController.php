<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Plataform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function showGroups(Plataform $id)
    {





        $grupos = Group::where('plataform_id',  $id->id)->withCount('users')->get();


        foreach ($grupos as $grupo) {
            $sitios_totales = $grupo->plataform->capacidad;
        }


        return view('groups.index', compact('grupos', 'id', 'sitios_totales'));
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
        //
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


        $grupo = Group::find($id);

        if (!$grupo) {
            return redirect()->route('dashboard')->with('warning', 'Lo sentimos, este grupo no existe.');
        }

        $user = Auth::user();

        if ($grupo->users->contains($user)) {
            return redirect()->route('dashboard')->with('warning', 'Ya estás en este grupo.');
        }

        if ($grupo->users->count() >= $grupo->sitios_totales) {
            return redirect()->route('dashboard')->with('warning', 'Lo sentimos, este grupo ya está lleno.');
        }

        // Si llega aquí, el usuario puede unirse al grupo
        $grupo->users()->attach($user->id);

        return redirect()->route('dashboard')->with('success', 'Te has unido al grupo exitosamente!');
    }
}
