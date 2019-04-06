<?php

namespace App\Http\Controllers;

use App\Entities\Grade;

class GradeController
{
    public function index()
    {
        $grades = Grade::paginate(10);

        return view('grades.index', compact('grades'));
    }
}