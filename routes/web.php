<?php

use App\Http\Controllers\Admin\MenuController;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Admin\Users\LoginController;
use \App\Http\Controllers\Admin\Users\LoginController;
use \App\Http\Controllers\Admin\MainController;
use \App\Http\Controllers\Admin\Products\ProductController;
use \App\Http\Controllers\Admin\Products\UploadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/admin/users/login');
});

Route::get('/admin/users/login', [
    LoginController::class,
    'index'
])->name('login');
route::post('/admin/users/login/store', [
    LoginController::class,
    'store'
]);
Route::middleware(['auth'])->group(function () {
    // ...

    #Admin
        Route::prefix('admin')->group(function () {
            Route::get('/', [
                MainController::class,
                'index'
            ])->name('admin');
            Route::get('main', [
                MainController::class,
                'index'
            ]);
        #Menu
        Route::prefix('menus')->group(function () {
            Route::get('/', [
                MenuController::class,
                'index'
            ]);
            Route::get('add', [
                MenuController::class,
                'create'
            ]);
            Route::post('add', [
                MenuController::class,
                'store'
            ]);
            Route::get('list', [
                MenuController::class,
                'index'
            ]);
            Route::delete('destroy', [
                MenuController::class,
                'destroy'
            ]);
            Route::get('edit/{menu}', [
                MenuController::class,
                'show'
            ]);
            Route::post('edit/{menu}', [
                MenuController::class,
                'update'
            ]);
        });
        //Product
        Route::prefix('products')->group(function (){
            Route::get('/', [
                ProductController::class,
                'index'
            ])->name('products');
            Route::get('add', [
                ProductController::class,
                'create'
            ]);
            Route::post('add', [
                ProductController::class,
                'store'
            ]);
            Route::get('/edit/{product}', [
                ProductController::class,
                'show'
            ]);
        });
        //Upload
        Route::post('upload/services', [
            UploadController::class,
            'store'
        ]);
    });
    #Menu

});
