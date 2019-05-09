<?php

namespace App\Http\Controllers;

use App\Entities\Subject;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin'])->except(['index']);
    }

    public function index(): View
    {
        $subjects = Subject::all();

        return view('subjects.index', compact('subjects'));
    }

    public function create(): View
    {
        return view('subjects.create');
    }

    public function store(Request $request): RedirectResponse
    {
        return $this->save($request, new Subject(), trans('messages.create.subjects'));
    }

    public function edit(Subject $subject)
    {
        return view('subjects.edit', compact('subject'));
    }

    public function update(Request $request, Subject $subject): RedirectResponse
    {
        return $this->save($request, $subject, trans('messages.update.subjects'));
    }

    public function destroy(Subject $subject): RedirectResponse
    {
        $subject->delete();

        return redirect()->route('subjects.index')->with('success', trans('messages.delete.subjects'));
    }

    private function save(Request $request, Subject $subject, $message): RedirectResponse
    {
        $request->validate(Subject::validations());

        $subject->fill($request->all());

        $classes = $request->get('class_grades');
        $classes = explode(', ', $classes);

        $subject->class_grades = $classes;
        $subject->save();

        return redirect()->route('subjects.index')->with('success', $message);
    }
}
