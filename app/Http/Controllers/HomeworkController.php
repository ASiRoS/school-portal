<?php

namespace App\Http\Controllers;

use App\Entities\ClassEntity;
use App\Entities\Homework;
use App\Entities\Subject;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HomeworkController extends Controller
{
    public function __construct()
    {
        $routes = ['index', 'show'];

        $this->middleware(['auth', 'student'])->only($routes);
        $this->middleware(['auth', 'teacher'])->except($routes);
    }

    public function index()
    {
        $user = auth()->user();
        $subjects = Subject::searchByClassGrade($user->class);

        return view('homeworks.index', compact('subjects'));
    }

    public function show(Subject $subject)
    {
        $user = auth()->user();
        $homeworks = Homework::search($subject, $user->class)->paginate(15);

        return view('homeworks.show', compact('homeworks'));
    }

    public function create()
    {
        $classes  = ClassEntity::all();
        $subjects = Subject::all();

        return view('homeworks.create', compact('classes', 'subjects'));
    }

    public function store(Request $request): RedirectResponse
    {
        return $this->save($request, new Homework(), trans('messages.store.homeworks'));
    }

    public function edit(Homework $homework)
    {
        $classes  = ClassEntity::all();
        $subjects = Subject::all();

        return view('homeworks.edit', compact('homework', 'classes', 'subjects'));
    }

    public function update(Request $request, Homework $homework)
    {
        return $this->save($request, $homework, trans('messages.update.homeworks'));
    }

    public function destroy(Homework $homework)
    {
        $homework->delete();

        return redirect()->route('home')->with('success', trans('messages.delete.homeworks'));
    }

    public function teachers()
    {
        $user = auth()->user();
        $homeworks = Homework::where(['teacher_id' => $user->id])->paginate(15);

        return view('homeworks.teachers', compact('homeworks'));
    }

    private function save(Request $request, Homework $homework, $message): RedirectResponse
    {
        $request->validate(Homework::validations());

        $homework->fill($request->all());
        if(!$homework->id) {
            $homework->teacher_id = auth()->user()->id;
        }

        $homework->save();

        return redirect()->home()->with('success', $message);
    }
}