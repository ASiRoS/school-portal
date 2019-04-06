<?php

namespace App\Http\Controllers;

use App\Entities\Menu;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $menus = Menu::published()->get();

        return view('home', compact('menus'));
    }
}
