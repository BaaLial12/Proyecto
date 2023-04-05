<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Plataform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlataformController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        $plataformas = Plataform::all();

        return view('admin.plataforms.index' , compact('plataformas'));



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


        $categorias = Category::pluck('nombre' , 'id')->toArray();


        return view('admin.plataforms.create' , compact('categorias'));

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
     * @param  \App\Models\Plataform  $plataform
     * @return \Illuminate\Http\Response
     */
    public function show(Plataform $plataform)
    {
        //

        return view('admin.plataforms.show' , compact('plataform'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plataform  $plataform
     * @return \Illuminate\Http\Response
     */
    public function edit(Plataform $plataform)
    {
        //

        return view('admin.plataforms.edit' , compact('plataform'));



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plataform  $plataform
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plataform $plataform)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plataform  $plataform
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plataform $plataform)
    {
        //
        Storage::delete($plataform->logo);
        $plataform->delete();
        return redirect()->route('admin.plataforms.index')->with('info' , 'Plataforma Eliminada');
    }
}
