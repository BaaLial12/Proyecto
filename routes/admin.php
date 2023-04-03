<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PlataformController;

Route::get('' , [HomeController::class , 'index'])->name('admin.home');


//Creamos la ruta resource para poder hacer el CRUD de CATEGORIAS

Route::resource('categories' , CategoryController::class)->names('admin.categories');


//Creamos la ruta resource para poder hacer el CRUD de Plataformas

Route::resource('plataforms' , PlataformController::class)->names('admin.plataforms');