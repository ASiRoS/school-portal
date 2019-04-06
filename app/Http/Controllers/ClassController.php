<?php

namespace App\Http\Controllers;

use App\Entities\ClassEntity;

class ClassController extends Controller
{
    public function index()
    {
        $classes = ClassEntity::paginate(10);

        return view('classes.index', compact('classes'));
    }
}