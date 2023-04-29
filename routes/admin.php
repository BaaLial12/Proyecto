<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PlataformController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ServiceController;
use App\Models\Plataform;

Route::get('' , [HomeController::class , 'index'])->middleware('can:admin.home')->name('admin.home');


Route::resource('users', UserController::class)->only(['index' , 'edit' , 'update'])->names('admin.users');


//Creamos la ruta resource para poder hacer el CRUD de CATEGORIAS

Route::resource('categories' , CategoryController::class)->names('admin.categories');


//Creamos la ruta resource para poder hacer el CRUD de Plataformas como MENTAR PROBLEMA CON API

// Route::resource('plataforms' , PlataformController::class)->names('admin.plataforms');

Route::get('plataforms' , [PlataformController::class , 'index'])->name('admin.plataforms.index');

Route::get('plataforms/create' , [PlataformController::class , 'create'])->name('admin.plataforms.create');

Route::post('plataforms' , [PlataformController::class , 'store'])->name('admin.plataforms.store');


Route::get('plataforms/{nombre}/edit' , [PlataformController::class , 'edit'])->name('admin.plataforms.edit');

Route::put('plataforms/{nombre}/update' , [PlataformController::class , 'update'])->name('admin.plataforms.update');


Route::delete('plataforms/{nombre}' , [PlataformController::class , 'destroy'])->name('admin.plataforms.destroy');







//Rutas para CRUD de service
Route::get('services' , [ServiceController::class , 'index'])->name('admin.services.index');
Route::delete('services/{id}' , [ServiceController::class, 'destroy'])->name('admin.services.destroy');
Route::post('services/create' , [ServiceController::class , 'store'])->name('admin.services.create');
