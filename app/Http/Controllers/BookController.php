<?php

namespace App\Http\Controllers;

use App\Entities\Book;

class BookController
{
    public function index()
    {
        $books = Book::paginate(10);

        return view('books.index', compact('books'));
    }
}