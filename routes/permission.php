<?php
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PermissionController;
Route::middleware('auth')->group(function () {
   Route::prefix('permissions')->group(function () {
       Route::get('/', [
            PermissionController::class,
           'viewroles'
       ])->name('permissions_index');
       Route::get('/setting',[
           PermissionController::class,
          'viewsettings'
       ])->name('permission_setting');
       Route::post('/save',[
           PermissionController::class,
           'savesetting'
       ])->name('permission_save');
   }) ;
});
