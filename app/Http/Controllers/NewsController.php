<?php

namespace App\Http\Controllers;

use App\Entities\News;

class NewsController
{
    public function index()
    {
        $news = News::published()->paginate(10);

        return view('news.index', compact('news'));
    }
}