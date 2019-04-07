<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class LocalizationController
{
    public function change(string $locale): RedirectResponse
    {
        Session::put('locale', $locale);

        return redirect()->back();
    }
}