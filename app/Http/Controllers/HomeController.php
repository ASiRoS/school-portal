<?php

namespace App\Http\Controllers;

use App\Entities\Menu;
use App\Entities\News;
use App\Entities\Partner;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $news  = News::latest()->take(5)->get();
        $partners = Partner::latest()->take(5)->get();

        return view('home', compact('news', 'partners'));
    }

    public function about()
    {
        return view('pages.about');
    }
}
