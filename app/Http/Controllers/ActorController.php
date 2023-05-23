<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActorRequest;
use App\Http\Requests\UpdateActorRequest;
use App\Models\Actor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ActorController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (auth()->check() && auth()->user()->hasRole('admin') && auth()->user()->can('access-cruds')) {
                return $next($request);
            }

            throw new NotFoundHttpException();
        });
    }


    public function index()
    {
        $actors = Actor::paginate(10);
        return view('actors.index', compact('actors'));
    }

    public function create()
    {
        $actor = new Actor();
        return view('actors.create', compact('actor'));
    }

    public function store(StoreActorRequest $request)
    {
        $actor = new Actor;

        $actor->name = $request->input('name');
        $actor->birth_date = $request->input('birth_date');
        $actor->description = $request->input('description');
        $actor->actor_type = $request->input('actor_type');
        $actor->text_field = $request->input('text_field');

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoPath = $photo->store('public/images/actors');
            $actor->photo_src = Storage::url($photoPath);
        }

        if ($actor->save()) {
            return redirect()->route('actors.index')->with('success', 'Actor created successfully.');
        } else {
            return back()->withInput()->with('error', 'Failed to create actor.');
        }
    }

    public function show(Actor $actor)
    {
        return view('actors.show', compact('actor'));
    }

    public function edit(Actor $actor)
    {
        return view('actors.edit', compact('actor'));
    }

    public function update(UpdateActorRequest $request, Actor $actor)
    {
        $actor->name = $request->input('name');
        $actor->birth_date = $request->input('birth_date');
        $actor->description = $request->input('description');
        $actor->actor_type = $request->input('actor_type');
        $actor->text_field = $request->input('text_field');

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoPath = $photo->store('public/images/actors');
            $actor->photo_src = Storage::url($photoPath);
        }

        if ($actor->save()) {
            return redirect()->route('actors.index');
        } else {
            return back()->withInput()->with('error', 'Failed to update actor.');
        }
    }

    public function destroy(Actor $actor)
    {
        $actor->delete();

        return redirect()->route('actors.index');
    }
}
