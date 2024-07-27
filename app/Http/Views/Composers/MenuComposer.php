<?php

namespace App\Http\Views\Composers;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MenuComposer
{
    /**
     * Create a new profile composer.
     */
    public function __construct() {

    }

    /**
     * Bind data to the view.
     */
    public function compose(View $view)
    {
        $menus = DB::table('menus')->where('active', 1)->orderByDesc('id')->get();
        $view->with('menus', $menus);
    }
}
