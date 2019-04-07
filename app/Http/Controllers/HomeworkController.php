<?php

namespace App\Http\Controllers;

use App\Entities\Homework;

class HomeworkController extends Controller
{
    public function index()
    {
        $homeworks = Homework::paginate(10);

        return view('homeworks.index', compact('homeworks'));
    }
}