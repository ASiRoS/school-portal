<?php

namespace App\Http\Controllers;

use App\Entities\UsefulLink;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UsefulLinkController extends Controller
{
    public function index(): View
    {
        $links = UsefulLink::all();

        return view('links.index', compact('links'));
    }

    public function show(): void
    {
        abort(404);
    }

    public function create(): View
    {
        return view('links.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $link = new UsefulLink();
        return $this->save($request, $link);
    }

    public function edit(UsefulLink $link): View
    {
        return view('links.edit', compact('link'));
    }

    public function update(Request $request, UsefulLink $link): RedirectResponse
    {
        return $this->save($request, $link);
    }

    public function delete(UsefulLink $link): RedirectResponse
    {
        $link->delete();

        return redirect()->route('links.index')->with(trans('messages.delete.links'));
    }

    private function save(Request $request, UsefulLink $link): RedirectResponse
    {
        $request->validate(UsefulLink::validations());

        $link->fill($request->all());
        $link->is_published = true;
        $link->save();

        return redirect()->route('links.index');
    }
}