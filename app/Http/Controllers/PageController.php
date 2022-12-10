<?php

namespace App\Http\Controllers;
use App\Models\EventList;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function Index() {
        $events=EventList::orderBy('eventdate', 'desc')->limit(7)->get();
        return view('welcome')->withEvents($events);
    }
}
