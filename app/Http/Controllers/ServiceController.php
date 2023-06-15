<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Plataform;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $services = Service::all();
        $categorias = Category::all();
        return view('admin.servicess.index', compact('services', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $this->middleware('can:admin.home');
        //Validacion de campos
        $request->validate([
            'nombre' => 'required|string|min:2|max:17|unique:plataforms,nombre',
            'descripcion' => 'required|string|min:5|max:22',
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
            'statement_descriptor' => 'Subs to : ' . $request->nombre
        ]);
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
        // dd($request->nombre , $request->url , $request->pagina , $request->categoria);
        $request->validate([
            'nombre' => ['required', 'string', 'min:2'],
            'url' => ['required', 'url'],
            'pagina' => ['required', 'url'],
            'categoria' => ['required', 'exists:categories,id'],
        ]);

        Service::create([
            'nombre' => $request->nombre,
            'url_service' => $request->url,
            'url_offer' => $request->pagina,
            'category_id' => $request->categoria,
        ]);

        return redirect()->route('marketplace')->with('success_msg', 'Gracias');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($service)
    {
        //
        $this->middleware('can:admin.home');


        $ids = Service::all()->pluck('id')->toArray();

        //Con esto me "protejo" para que no puedan borrar algo que no exista
        if (!in_array($service, $ids)) {
            return redirect()->route('admin.services.index')->with('error_msg', 'Estás intentando borrar algo que no existe');
        }

        //Me traigo el objeto y lo elimino
        $service_obj=Service::find($service);




        $service_obj->delete();

        return redirect()->route('admin.services.index')->with('success_msg', 'El servicio ha sido rechazado');
    }
}
