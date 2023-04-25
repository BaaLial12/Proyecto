<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Plataform;
use App\Models\User;
use App\Notifications\GrupoBorrado;
use App\Notifications\UsuarioSalioDeGrupo;
use App\Notifications\UsuarioUnidoAGrupo;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Stripe\Stripe;
use Stripe\Price;

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
        $plataform_id = Plataform::where('nombre', $plataforma)->pluck('id')->first();

        //Comprobacion que el id exista , sino lo mandamos al mismo sitio
        if (!$plataform_id) {
            return redirect()->route('marketplace');
        }


        //Con esto lo que hago es traerme todos los grupos que tienen de plataform_id la variable arriba creada y ademas cuento los usuarios
        $grupos = Group::where('plataform_id',  $plataform_id)->withCount('users')->get();

        //Me guardo en una variable los sitios totales(capacidad) de cada plataforma
        $sitios_totales = Plataform::where('nombre', $plataforma)->pluck('capacidad')->first();


        return view('groups.index', compact('grupos', 'plataform_id', 'sitios_totales'));
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
        $grupo = Group::find($group->id);
        //Me guardo el id del usuario que esta logueado
        $user_id = Auth::user()->id;
        //Me guardo el id de la plataforma que me ayudara luego
        $plataform_id = $group->plataform_id;
        //Me guardo en una variable todas las ids de grupos
        $groups_ids = Group::all()->pluck('id')->toArray();
        //Me guardo en una variable todas las ids de grupo que pertenecen al usuario logueado
        $groups_ids_user = auth()->user()->groups()->pluck('group_id')->toArray();
        $id_del_grupo_que_tiene_esa_id_plataforma = Group::where('user_id', $user_id)->where('plataform_id', $plataform_id)->first();
        //Comprobamos que exista el id del grupo en todos los ids de grupos
        if (!in_array($group->id, $groups_ids)) {
            return redirect()->route('dashboard')->with('error_msg', 'No puedes borrar algo que no existe ;( ');
        }
        if ($group->owner->id != $user_id && in_array($group->id, $groups_ids_user)) {
            // dd("No eres propietario pero estas en el grupo y quieres salir");
            Auth::user()->groups()->wherePivot('group_id', $group->id)->detach();
            $group->owner->notify(new UsuarioSalioDeGrupo($group->id, $group->plataform->nombre));
            return redirect()->route('dashboard')->with('success_msg', 'Has salido del grupo');
        }
        if ($group->owner->id == $user_id && $group->id == $id_del_grupo_que_tiene_esa_id_plataforma->id) {
            //Necesito traerme todos los usuarios que estan en el grupo
            $admin = $group->owner->id;
            $users = Group::find($group->id)->users()->where('user_id', '<>', $admin)->get();
            foreach ($users as $user) {
                // dd($group->owner);
                $user->notify(new GrupoBorrado($group->plataform->nombre));
            }
            $group->delete();
            return redirect()->route('dashboard')->with('success_msg', 'Grupo eliminado');
        }
    }






    public function administration($group)
    {
        //Con find lo que hacemos es buscar un registro por su id , en la tabla group y devuelve el modelo asociado a ese registro
        $grupo = Group::find($group);
        $messages = $grupo->messages()->orderBy('created_at', 'asc')->get();
        return view('groups.administration', compact('grupo', 'messages'));
    }


    public function joinGroup($id)
    {
        $user = Auth::user()->id;
        $grupo = Group::find($id);

        //Me guardo la plataform_id
        $plataform_id = $grupo->plataform_id;


        //Me guardo en un array todas las plataform_id que tiene un usuario
        $plataforms_by_user = auth()->user()->groups()->pluck('plataform_id')->toArray();

        //Primera comprobacion , que exista el grupo
        if (!Group::where('id', $id)->exists()) {
            return redirect()->route('dashboard')->with('error_msg', 'Lo sentimos, este grupo no existe.');
        }

        //Segunda comprobacion que el usuario no se intente unir a un grupo que ya es miembro
        if ($grupo->users->contains($user)) {
            return redirect()->route('dashboard')->with('error_msg', 'Ya perteneces a este grupo.');
        }

        if (!in_array($plataform_id, $plataforms_by_user)) {
            //Me guardo en una variable la capacidad de la plataforma en funcion del id de grupo que le esta pasando al intentar unirse
            $capcidad_plataform = Plataform::where('id', $plataform_id)->first();
            //Comprobamos por ultimo que no este lleno el grupo
            if ($grupo->users()->count() > $capcidad_plataform->capacidad) {
                return redirect()->route('dashboard')->with('error_msg', 'Lo sentimos el grupo al que intentas unirte esta lleno!');
            }
            // Si llega aquí, el usuario puede unirse al grupo

            // ESTO DE AQUI FUNCIONA-----------------------------------------
            // $precio = round(($grupo->plataform->suscripcion/$grupo->plataform->capacidad),2)*100;

            // // Generar la URL de pago
            // $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
            // $session = $stripe->checkout->sessions->create([
            //     'payment_method_types' => ['card'],
            //     'line_items' => [[
            //         'price_data' => [
            //             'currency' => 'eur',
            //             'unit_amount' => $precio,
            //             'product_data' => [
            //                 'name' => 'SERVICIO',
            //                 'description' => 'Unión a grupo en plataforma ' . $grupo->plataform->nombre,
            //             ],
            //         ],
            //         'quantity' => 1,
            //     ]],
            //     'mode' => 'payment',
            //     'success_url' => route('joinGroupSuccess', ['group' => $id]),
            //     'cancel_url' => route('dashboard'),
            // ]);

            // // return [
            // //     'url' => $session->url
            // // ];
            // return redirect($session->url);

            //AQUI TERMINA LO QUE FUNCIONA-------------------------------------




            Stripe::setApiKey(env('STRIPE_SECRET'));

            // $platformName = "NETFLIX";
            $platformName = $grupo->plataform->nombre;

            $prices = Price::all(['active' => true, 'expand' => ['data.product']]);
            $priceData = null;


            foreach ($prices as $price) {
                $product = $price->product;
                if ($product->name == $platformName) {
                    $priceData = $price;
                    // dd($priceData);
                    break;
                }
            }

            if (!$priceData) {
                // no se encontró el precio para esa plataforma
                return redirect()->back()->withErrors(['No se encontró el precio para la plataforma especificada.']);
            }

            // ahora que tienes el objeto de precio para esa plataforma, puedes crear la sesión de pago con el precio correspondiente
            $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price' => $priceData->id,
                    'quantity' => 1,
                ]],
                'mode' => 'subscription',
                'success_url' => route('joinGroupSuccess', ['group' => $id]),
                'cancel_url' => route('dashboard'),
            ]);

            // y devolver la URL de la sesión de pago a la que se redirigirá al usuario

            return redirect($session->url);




            // $grupo->users()->attach($user);
            // $grupo->owner->notify(new UsuarioUnidoAGrupo($grupo->id, $grupo->plataform->nombre));
            // return redirect()->route('dashboard')->with('success_msg', 'Te has unido al grupo exitosamente!');
        } else {
            return redirect()->route('dashboard')->with('error_msg', 'Ya perteneces a un grupo que comparte esta plataforma.');
        }
    }


    //Me saco en una funcion lo que tenia en el joinGroup
    public function joinGroupSuccess($group)
    {
        $user = Auth::user()->id;
        $grupo = Group::find($group);
        $grupo->users()->attach($user);
        $grupo->owner->notify(new UsuarioUnidoAGrupo($grupo->id, $grupo->plataform->nombre));
        return redirect()->route('dashboard')->with('success_msg', 'Te has unido al grupo exitosamente!');
    }
}
