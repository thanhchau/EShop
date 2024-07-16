<?php
use Illuminate\Support\Facades\Route;
Route::middleware('auth')->group(function () {

    Route::prefix('/pos')->group(function () {
       Route::get('/', [
            \App\Http\Controllers\PosController::class,
           'index'
       ])->name('pos');
       Route::post('/',[
           \App\Http\Controllers\PosController::class,
           'saveorder'
       ])->name('pos_save');
    });
});
