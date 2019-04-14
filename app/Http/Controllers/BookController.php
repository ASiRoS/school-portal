<?php

namespace App\Http\Controllers;

use App\Entities\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin'])->only(['create', 'store', 'edit', 'update', 'delete']);
    }

    public function index(): View
    {
        $books = Book::paginate(10);

        return view('books.index', compact('books'));
    }

    public function show(): void
    {
        abort(404);
    }

    public function create(): View
    {
        return view('books.create');
    }

    public function store(Request $request): RedirectResponse
    {
        return $this->save($request, new Book());
    }

    public function edit(Book $book): View
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book): RedirectResponse
    {
        return $this->save($request, $book);
    }

    public function delete(Book $book): RedirectResponse
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', trans('book'));
    }

    private function save(Request $request, Book $book): RedirectResponse
    {
        $request->validate(Book::validations());

        $book->fill($request->all());
        $book->is_published = true;

        if($request->hasFile('book')) {
            $book->setFile($request->file('book'));
        } else {
            $book->is_ebook = false;
        }

        $book->saveOrFail();

        return redirect()->route('books.index');
    }
}