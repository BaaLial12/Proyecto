<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PlataformController;
use App\Http\Controllers\Admin\UserController;

Route::get('' , [HomeController::class , 'index'])->middleware('can:admin.home')->name('admin.home');


Route::resource('users', UserController::class)->only(['index' , 'edit' , 'update'])->names('admin.users');


//Creamos la ruta resource para poder hacer el CRUD de CATEGORIAS

Route::resource('categories' , CategoryController::class)->names('admin.categories');


//Creamos la ruta resource para poder hacer el CRUD de Plataformas

Route::resource('plataforms' , PlataformController::class)->names('admin.plataforms');
