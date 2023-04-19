<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Plataform;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    //Con esto lo que hacemos es que solamente las permisonas con el permiso admin.home puedan acceder a todo lo relacionado con Category
    public function __construct()
    {
        $this->middleware('can:admin.home');
    }

    //Funcion que me permitira enseñar al usuario un filtro de todas las plataformas en funcion de su categoria
    public function showbycategorie($nombre){


        $categoria_id = Category::where('nombre' , $nombre)->pluck('id')->first();
        $plataforms_by_categorie = Plataform::all();
        return view('marketplace.filterbycategorie' , compact('categoria_id' , 'plataforms_by_categorie'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categorias = Category::all();




        return view('admin.categories.index' , compact('categorias'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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


        $request->validate([
            'nombre' => 'required|unique:categories,nombre|string|min:1'
        ]);

        $categoria = Category::create([
            'nombre' => $request->nombre
        ]);

        return redirect()->route('admin.categories.index' , compact('categoria'))->with('success_msg' , 'Categoria Creada');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.categories.show' , compact('category'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit' , compact('category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //


        $request->validate([
            'nombre' => ['required' , 'string' , 'min:1' , 'unique:categories,nombre,'.$category->id]
        ]);

        $category->update($request->all());

        return redirect()->route('admin.categories.index' , compact('category'))->with('success_msg' , 'Categoria Actualizada');




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //


        $category->delete();

        return redirect()->route('admin.categories.index')->with('success_msg' , 'Categoria Eliminada');


    }
}
