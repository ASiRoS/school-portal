<?php

namespace App\Http\Controllers;

use App\Entities\Comment;
use App\Entities\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['comment']);
        $this->middleware(['auth', 'admin'])->only(['create', 'store', 'edit', 'update']);
    }

    public function index(): View
    {
        $news = News::published()->paginate(12);

        return view('news.index', compact('news'));
    }

    public function create(): View
    {
        return view('news.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $article = new News();

        return $this->save($article, $request);
    }

    public function edit(News $news): View
    {
        $article = $news;

        return view('news.edit', compact('article'));
    }

    public function update(Request $request, News $article)
    {
        return $this->save($article, $request);
    }

    public function show($id): View
    {
        $article  = News::published()->where(['id' => $id])->firstOrFail();
        $comments = Comment::where(['news_id' => $id])->paginate(10);

        return view('news.show', compact('article', 'comments'));
    }

    public function comment(News $article, Request $request): RedirectResponse
    {
        if(!$article->is_published) {
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

    private function save(News $article, Request $request): RedirectResponse
    {
        $request->validate(News::validations());

        $article->fill($request->all());
        $article->setImage($request->file('preview_image'));
        $article->is_published = true;
        $article->save();

        return redirect()->route('news.show', ['news' => $article]);
    }
}