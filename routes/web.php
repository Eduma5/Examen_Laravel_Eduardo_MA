<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas para gestión de categorías usando resource routes
Route::resource('categorias', CategoriaController::class);
