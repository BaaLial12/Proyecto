<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Plataform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlataformController extends Controller
{


    //Con esto lo que hacemos es que solamente las permisonas con el permiso admin.home puedan acceder a todo lo relacionado con Plataform
    public function __construct()
    {
        $this->middleware('can:admin.home');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        $plataformas = Plataform::all();

        return view('admin.plataforms.index', compact('plataformas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


        $categorias = Category::pluck('nombre', 'id')->toArray();


        return view('admin.plataforms.create', compact('categorias'));
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

        //Validacion de campos
        $request->validate([
            'nombre' => 'required|string|min:2|unique:plataforms,nombre',
            'descripcion' => 'required|string|min:3',
            'capacidad' => 'required|integer|min:1',
            'suscripcion' => 'required|numeric|min:0',
            'categoria' => 'required|exists:categories,id',
            'imagen' => 'required|image|mimes:png|max:2048',

        ]);

        //Si salimos de aqui las validaciones han ido bien

        //Guardamos la imagen

        $img = $request->imagen->store('plataformas');


        //Creamos el registro en la BD

        Plataform::create([

            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'capacidad' => $request->capacidad,
            'suscripcion' => $request->suscripcion,
            'category_id' => $request->categoria,
            'logo' => $img
        ]);

        $precio_segun_capacidad = (round($request->suscripcion / $request->capacidad, 2)) * 100;

        $stripe = new \Stripe\StripeClient(
            'sk_test_51N0gRELnKtweIPwLPkvOFOdBUJzlFjDyHKESg6bDhFn9erZ7AkyqtNxSVn0wLX7EG4qrKdJ4GpscTW4pvLYRMQGU0055QNZ8ur'
        );
        $stripe->products->create([
            'name' => trim($request->nombre),
            'description' => $request->descripcion,
            'id' => $request->nombre,
            'default_price_data' => [
                'currency' => 'eur',
                'unit_amount' => $precio_segun_capacidad,
                'recurring' => ['interval' => 'month']

            ],
            'statement_descriptor' => $request->nombre . ' 1 mes'
        ]);

        return redirect()->route('admin.plataforms.index')->with('success_msg', 'Plataforma Creada');
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

        return view('admin.plataforms.show', compact('plataform'));
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

        $categorias = Category::pluck('nombre', 'id')->toArray();
        return view('admin.plataforms.edit', compact('plataform', 'categorias'));
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


        //Validacion de campos
        $request->validate([
            'nombre' => 'required|string|min:2|unique:plataforms,nombre,' . $plataform->id,
            'descripcion' => 'required|string|min:3',
            'capacidad' => 'required|integer|min:1',
            'suscripcion' => 'required|numeric|min:0',
            'categoria' => 'required|exists:categories,id',
            'imagen' => 'nullable|image|mimes:png|max:2048',

        ]);

        //Si salimos de aqui las validaciones han ido bien

        //Si se ha subido una imagen se guarda en fotos , si no mantenemos la antigua
        $img = ($request->imagen) ? $request->imagen->store('plataformas') : $plataform->logo;
        $img1 = $plataform->logo;
        $plan_id = $plataform->nombre;



        //Actualizamos el registro en la BD

        $plataform->update([

            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'capacidad' => $request->capacidad,
            'suscripcion' => $request->suscripcion,
            'category_id' => $request->categoria,
            'logo' => $img
        ]);

        //Comprobamos si hemos subido una imagen nueva para borrar la vieja
        if ($request->imagen) {
            Storage::delete($img1);
        }


        $precio_segun_capacidad = (round($request->suscripcion / $request->capacidad, 2)) * 100;
        $stripe = new \Stripe\StripeClient(
            'sk_test_51N0gRELnKtweIPwLPkvOFOdBUJzlFjDyHKESg6bDhFn9erZ7AkyqtNxSVn0wLX7EG4qrKdJ4GpscTW4pvLYRMQGU0055QNZ8ur'
        );
        // $stripe->products->update(
        //     $plan_id,
        //     [
        //         'name' => $request->nombre,
        //         'description' => $request->descripcion,
        //         'statement_descriptor' => $request->nombre . ' 1 mes',
        //         'default_price' => $request->nombre
        //     ]
        // );

        // $stripe->prices->update(
        //     $plan_id,
        //     [
        //         'currency' => 'eur',
        //         'unit_amount' => $precio_segun_capacidad,
        //         'recurring' => ['interval' => 'month']

        //     ]

        // );





        return redirect()->route('admin.plataforms.index')->with('success_msg', 'Plataforma Actualizada');
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

        $stripe = new \Stripe\StripeClient(
            'sk_test_51N0gRELnKtweIPwLPkvOFOdBUJzlFjDyHKESg6bDhFn9erZ7AkyqtNxSVn0wLX7EG4qrKdJ4GpscTW4pvLYRMQGU0055QNZ8ur'
        );
        $plan_id = $plataform->nombre;

        $stripe->prices->update(
            $plan_id,
            [
                'unit_amount' => 0
            ]
            );

        $stripe->products->delete($plan_id);

        dd("Hola");
        $plataform->delete();
        return redirect()->route('admin.plataforms.index')->with('success_msg', 'Plataforma Eliminada');
    }
}
