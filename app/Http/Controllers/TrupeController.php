<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;

class TrupeController extends Controller


{
    public function index()
    {
        $actors = Actor::all();
        return view('mainpages.trupe', compact('actors'));
    }
}



