<?php

namespace App\Providers;
use App\Http\Views\Composers\MenuComposer;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class ViewServiceProvider extends ServiceProvider
{
         public function register(){

         }
         public function boot(){
            View::composer('header', MenuComposer::class);
             View::composer('banner', MenuComposer::class);
         }
}
