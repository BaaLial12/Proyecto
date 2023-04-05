<?php

use App\Http\Controllers\CategoryController;
use App\Models\Category;
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
Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



//Route::resource('categories' , CategoryController::class)->names('admin.categories');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

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

        Auth::login($userNuevo);

    }


    return redirect('/dashboard');
    // $user->token
});
