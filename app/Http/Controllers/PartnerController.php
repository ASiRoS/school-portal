<?php

namespace App\Http\Controllers;

use App\Entities\Partner;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::published()->get();

        return view('partners.index', compact('partners'));
    }
}