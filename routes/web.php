<?php

use App\Http\Controllers\BillingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CredentialController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PlataformController;
use App\Http\Controllers\ServiceController;
use App\Models\Category;
use App\Models\Group;
use App\Models\Plataform;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//Cambio de ruta para que el que quiera acceder a mi pagina web tenga que estar logueado si o si
//Aparte me llevare una variable llamada contador a la vista dashboard donde le dira al usuario logueado la cantidad de plataformas que esta compartiendo
Route::get('/dashboard', function () {
    $contador = auth()->user()->groups()->count();
    $grupos = Group::where('user_id', auth()->user()->id)
                ->orWhereHas('users', function($query) {
                    $query->where('user_id', auth()->user()->id);
                })->get();

    return view('dashboard' , compact('contador' , 'grupos'));
})->middleware(['auth'])->name('dashboard');


Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/dashboard');
    } else {
        return view('welcome');
    }
})->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/marketplace' , function (){
        $plataformas = Plataform::all();
        $categorias = Category::all();
        return view('marketplace.index' , compact('categorias' , 'plataformas'));
    })->name('marketplace');
});



Route::get('/login-facebook', function () {
    return Socialite::driver('facebook')->redirect();
});

Route::get('/facebook-callback', function () {
    $user = Socialite::driver('facebook')->user();

    $userExists = User::where('external_id' , $user->id)->where('external_auth' , 'facebook')->first();


    if($userExists){
        Auth::login($userExists);
    } else{
       $userNuevo = User::create([
            'name' => $user->name,
            'email' => $user->email,
            'avatar' => $user->avatar,
            'external_id' => $user->id,
            'external_auth' => 'facebook',


        ]);
        $userNuevo->createAsStripeCustomer();
        Auth::login($userNuevo);

    }


    return redirect('/dashboard');
    // $user->token
});





Route::get('/login-google', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/google-callback', function () {
    $user = Socialite::driver('google')->user();

    $userExists = User::where('external_id' , $user->id)->where('external_auth' , 'google')->first();


    if($userExists){
        Auth::login($userExists);
    } else{
       $userNuevo = User::create([
            'name' => $user->name,
            'email' => $user->email,
            'avatar' => $user->avatar,
            'external_id' => $user->id,
            'external_auth' => 'google',


        ]);

        $userNuevo->createAsStripeCustomer();
        Auth::login($userNuevo);


    }


    return redirect('/dashboard');
    // $user->token
});



Route::get('/login-github', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/github-callback', function () {
    $user = Socialite::driver('github')->user();

    $userExists = User::where('external_id' , $user->id)->where('external_auth' , 'github')->first();


    if($userExists){
        Auth::login($userExists);
    } else{
       $userNuevo = User::create([
            'name' => $user->name,
            'email' => $user->email,
            'avatar' => $user->avatar,
            'external_id' => $user->id,
            'external_auth' => 'github',


        ]);
        $userNuevo->createAsStripeCustomer();
        Auth::login($userNuevo);

    }


    return redirect('/dashboard');
    // $user->token
});



Route::resource('groups' , GroupController::class);


Route::get('/credential' , [CredentialController::class , 'update'])->name('credential-update');

Route::get('/plataform/{nombre}/grupos' , [GroupController::class , 'showGroups'])->name('groups.showGroups');

Route::get('groups/administration/{grupo}' , [GroupController::class , 'administration'])->name('groups.administration');


Route::get('/unirse-grupo/{id}', [GroupController::class, 'joinGroup'])->name('unirse-grupo');

Route::get('/marketplace/{nombre}' , [CategoryController::class , 'showbycategorie'])->name('show-plataforms-by-categorie');

Route::post('/messages' , [MessageController::class , 'store'])->name('messages.store');


Route::get('/join-group-success/{group}', [GroupController::class, 'joinGroupSuccess'])->name('joinGroupSuccess');


//Ruta para que el usuario introduzca las tarjetas y protegida
Route::get('/billings' , [BillingController::class , 'index'])
->middleware('auth')
->name('billings.index');
