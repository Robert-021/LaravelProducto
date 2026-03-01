<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('productos.index');
});

Route::patch('productos/{producto}/toggle-estado', [ProductoController::class , 'toggleEstado'])->name('productos.toggleEstado');
Route::resource('productos', ProductoController::class);