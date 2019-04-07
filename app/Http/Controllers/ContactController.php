<?php

namespace App\Http\Controllers;

use App\Entities\Contact;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ContactController
{
    public function index()
    {
        return view('contacts.index');
    }

    public function store(Request $request)
    {
        $request->validate(Contact::validations());

        try {
            Contact::create($request->all());
        } catch (QueryException $exception) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $exception->errorInfo;

            return redirect()->home()->withErrors($errorInfo);
        }

        return redirect()->home()->with('success', __('messages.success.contacts'));
    }
}