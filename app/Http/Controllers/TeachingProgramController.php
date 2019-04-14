<?php

namespace App\Http\Controllers;

use App\Entities\Subject;
use App\Entities\TeachingProgram;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TeachingProgramController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin'])->except(['index', 'show']);
    }

    public function index(): View
    {
        $subjects = Subject::all();

        return view('program.index', compact('subjects'));
    }

    public function show(Subject $subject, $grade): View
    {
        $programs = TeachingProgram::where($subject, $grade)->paginate(12);

        return view('program.show', compact('programs'));
    }

    public function create(): View
    {
        $grades = range(1, 11);
        $subjects = Subject::all();

        return view('program.create', compact('grades', 'subjects'));
    }

    public function store(Request $request): RedirectResponse
    {
        return $this->save($request, new TeachingProgram());
    }

    public function edit(TeachingProgram $program): View
    {
        $grades = range(1, 11);
        $subjects = Subject::all();

        return view('program.edit', compact('program'));
    }

    public function update(Request $request, TeachingProgram $program): RedirectResponse
    {
        return $this->save($request, $program);
    }

    private function save(Request $request, TeachingProgram $program): RedirectResponse
    {
        $request->validate(TeachingProgram::validations());

        $program->fill($request->all());
        $program->save();

        return redirect()->route('programs.index');
    }
}