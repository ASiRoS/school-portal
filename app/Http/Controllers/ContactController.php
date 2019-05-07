<?php

namespace App\Http\Controllers;

use App\Entities\Contact;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController
{
    public function index(Request $request): View
    {
        if(!$request->user() && !$request->user()->isAdmin()) {
            return view('contacts.index');
        }

        $contacts = Contact::all();

        return view('contacts.list', compact('contacts'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate(Contact::validations());

        try {
            Contact::create($request->all());
        } catch (QueryException $exception) {
            $errorInfo = $exception->errorInfo;

            return redirect()->home()->withErrors($errorInfo);
        }

        return redirect()->home()->with('success', __('messages.success.contacts'));
    }
}