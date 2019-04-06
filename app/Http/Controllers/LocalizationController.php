<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class LocalizationController
{
    public function change(string $locale): void
    {
        Session::put('locale', $locale);
        return redirect()->back();
    }
}