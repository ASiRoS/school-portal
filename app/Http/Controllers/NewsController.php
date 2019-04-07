<?php

namespace App\Http\Controllers;

use App\Entities\Comment;
use App\Entities\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController
{
    public function index()
    {
        $news = News::published()->paginate(12);

        return view('news.index', compact('news'));
    }

    public function show($id)
    {
        $article  = News::published()->where(['id' => $id])->firstOrFail();
        $comments = Comment::where(['news_id' => $id])->paginate(10);

        return view('news.show', compact('article', 'comments'));
    }

    public function comment(News $article, Request $request)
    {
        if(Auth::guest() || !$article->is_published) {
            return redirect()->home();
        }

        $request->validate(Comment::validations());

        Comment::create([
            'news_id'   => $article->id,
            'author_id' => Auth::id(),
            'text'      => $request->get('text')
        ]);

        return redirect()->route('news.show', ['id' => $article->id]);
    }
}