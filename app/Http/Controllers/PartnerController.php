<?php

namespace App\Http\Controllers;

use App\Entities\Partner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PartnerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin'])->only([
            'create', 'store', 'edit', 'update'
        ]);
    }
    public function index(): View
    {
        $partners = Partner::published()->get();

        return view('partners.index', compact('partners'));
    }

    public function create(): View
    {
        return view('partners.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $partner = new Partner();

        return $this->save($request, $partner, trans('messages.store.partner'));
    }
    
    public function edit(Partner $partner): View
    {
        return view('partners.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner): RedirectResponse
    {
        return $this->save($request, $partner, trans('messages.update.partner'));
    }

    public function destroy(Partner $partner)
    {
        $partner->delete();

        return redirect()->route('partners.index', trans('messages'));
    }

    private function save(Request $request, Partner $partner, string $message): RedirectResponse
    {
        $request->validate(Partner::validations());

        $partner->is_published = true;
        $partner->fill($request->all());
        $partner->setImage($request->file('logo'));

        $partner->saveOrFail();

        return redirect()->route('partners.index')->with('success', $message);
    }
}