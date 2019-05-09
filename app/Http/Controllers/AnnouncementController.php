<?php

namespace App\Http\Controllers;

use App\Entities\Announcement;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AnnouncementController
{
    public function index(): View
    {
        $announcements = Announcement::published()->paginate(10);

        return view('announcements.index', compact('announcements'));
    }

    public function show(): void
    {
        abort(404);
    }

    public function create(): View
    {
        return view('announcements.create');
    }

    public function store(Request $request): RedirectResponse
    {
        return $this->save($request, new Announcement());
    }

    public function edit(Announcement $announcement): View
    {
        return view('announcements.edit', compact('announcement'));
    }

    public function update(Request $request, Announcement $announcement): RedirectResponse
    {
        return $this->save($request, $announcement);
    }

    private function save(Request $request, Announcement $announcement): RedirectResponse
    {
        $request->validate(Announcement::validations());

        $announcement->fill($request->all());
        $announcement->is_published = true;
        $announcement->save();

        return redirect()->route('announcements.index')->with('success', trans('messages.store.announcements'));
    }
}