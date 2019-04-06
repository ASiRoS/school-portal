<?php

namespace App\Http\Controllers;

use App\Entities\Announcement;

class AnnouncementController
{
    public function index()
    {
        $announcements = Announcement::published()->paginate(10);

        return view('announcements.index', compact('announcements'));
    }
}