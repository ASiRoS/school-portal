<?php

namespace App\Http\Controllers;

use App\Entities\ClassEntity;
use App\Entities\Day;
use App\Entities\Schedule;
use App\Entities\Subject;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ScheduleController
{
    public function index(Request $request): View
    {
        $schedules = [];
        $classes = ClassEntity::all();

        if($classId = $request->get('class_id')) {
            $schedules = Schedule::where('class_id', $classId)->get();
        }

        return view('schedules.index', compact('schedules', 'classes', 'classId'));
    }

    public function create(): View
    {
        $subjects = Subject::all();
        $classes = ClassEntity::all();
        $days = Day::getDays();

        return view('schedules.create', compact('subjects', 'classes', 'days'));
    }

    public function store(Request $request): RedirectResponse
    {
        return $this->save($request, new Schedule());
    }

    public function edit(Schedule $schedule): View
    {
        $subjects = Subject::all();
        $classes = ClassEntity::all();
        $days = Day::getDays();

        return view('schedules.edit', compact('schedule', 'subjects', 'classes', 'days'));
    }

    public function update(Request $request, Schedule $schedule): RedirectResponse
    {
        return $this->save($request, $schedule);
    }

    public function destroy(Schedule $schedule): RedirectResponse
    {
        $schedule->delete();

        return redirect()->route('schedules.index')->with('success', trans('messages.delete.schedule'));
    }

    private function save(Request $request, Schedule $schedule): RedirectResponse
    {
        $request->validate(Schedule::validations());

        $schedule->fill($request->all());
        $schedule->is_published = true;

        $schedule->saveOrFail();

        return redirect()->route('schedules.index');
    }
}