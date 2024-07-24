<?php
use Illuminate\Support\Facades\Route;
Route::prefix('category')->group(function () {
   Route::get('/',[
        \App\Http\Controllers\ApiCategoryController::class,
       'index'
   ]) ;
   Route::post('/create',[
       \App\Http\Controllers\ApiCategoryController::class,
       'store'
   ]);
});
