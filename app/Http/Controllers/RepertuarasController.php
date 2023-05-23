<?php

namespace App\Http\Controllers;

use App\Models\Repertoire;
use Illuminate\Http\Request;

class RepertuarasController extends Controller
{
    public function index()
    {
        $repertoires = Repertoire::all();

        return view('mainpages.repertuaras', compact('repertoires'));
    }

    public function show($slug)
    {
        $repertoire = Repertoire::where('event_name', $slug)->firstOrFail();

        return view('repertuaras.main', compact('repertoire'));
    }

}
