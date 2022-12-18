<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;




Route::controller(ProductoController::class)->group(function(){
    
    Route::get('/', 'Venta')->name('venta.producto'); 
    Route::get('/vendidos', 'vendidos')->name('productos.vendidos'); 
    Route::get('/productos', 'index')->name('productos'); 
    Route::get('/producto/{id}', 'show')->name('producto.show'); 
    Route::post('/producto','store')->name('producto.store');   

    Route::patch('compra/{id}','patch')->name('producto.patch');
    
    Route::put('/producto/{id}', 'update')->name('producto.update');
    Route::delete('/producto/{id}', 'destroy')->name('producto.destroy');
});
