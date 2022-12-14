<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;




Route::controller(ProductoController::class)->group(function(){
    Route::get('/', 'venta')->name('venta.producto');   
    Route::get('/productos', 'index')->name('productos');    
    Route::post('/producto', 'store')->name('producto.store');
    Route::get('/producto/{id}', 'show')->name('producto.show');
    Route::put('/producto/{id}', 'update')->name('producto.update');
    Route::patch('/producto/{id}', 'edit')->name('producto.edit');
    Route::delete('/producto/{id}', 'destroy')->name('producto.destroy');
});