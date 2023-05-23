<?php
namespace App\Http\Controllers;

use App\Helpers\Purifier;
use App\Http\Requests\StoreRepertoireRequest;
use App\Http\Requests\UpdateRepertoireRequest;
use App\Models\Actor;
use App\Models\Repertoire;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RepertoireController extends Controller
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
$repertoires = Repertoire::with('actors')->paginate(10);

return view('repertoire.index', compact('repertoires'));
}

public function create()
{
$actors = Actor::all();

return view('repertoire.create', compact('actors'));
}

    public function store(StoreRepertoireRequest $request)
    {
        $actorIds = array_map('intval', $request->input('actor_ids', []));

        $repertoire = new Repertoire([
            'event_name' => $request->input('event_name'),
            'slug' => $request->input('slug') ?: Str::slug($request->input('event_name')),
        ]);

        $repertoire->brief_description = Purifier::clean($request->input('brief_description'));
        $repertoire->full_description = Purifier::clean($request->input('full_description'));
        $repertoire->book = Purifier::clean($request->input('book'));
        $repertoire->bookauthor = Purifier::clean($request->input('bookauthor'));
        $repertoire->additional1 = Purifier::clean($request->input('additional1'));
        $repertoire->additional2 = Purifier::clean($request->input('additional2'));



        $repertoire->setImage($request->file('image'));
        $repertoire->save();

        $repertoire->actors()->sync($actorIds);

        return redirect()->route('repertoire.show', ['repertoire' => $repertoire->slug]);
    }

public function show($slug)
{
$repertoire = Repertoire::with('actors')->where('slug', $slug)->firstOrFail();

return view('repertoire.show', compact('repertoire'));
}

public function edit($slug)
{
$repertoire = Repertoire::where('slug', $slug)->firstOrFail();
$actors = Actor::all();

return view('repertoire.edit', compact('repertoire', 'actors'));
}

    public function update(UpdateRepertoireRequest $request, $slug)
    {
        $actorIds = array_map('intval', $request->input('actor_ids', []));

        $repertoire = Repertoire::where('slug', $slug)->firstOrFail();

        if ($request->hasFile('image')) {
            $repertoire->setImage($request->file('image'));
        }

        $repertoire->update([
            'event_name' => $request->input('event_name'),
            'slug' => $request->input('slug') ?: Str::slug($request->input('event_name')),
        ]);

        $repertoire->brief_description = Purifier::clean($request->input('brief_description'));
        $repertoire->full_description = Purifier::clean($request->input('full_description'));
        $repertoire->book = Purifier::clean($request->input('book'));
        $repertoire->bookauthor = Purifier::clean($request->input('bookauthor'));
        $repertoire->additional1 = Purifier::clean($request->input('additional1'));
        $repertoire->additional2 = Purifier::clean($request->input('additional2'));

        $repertoire->actors()->sync($actorIds);

        $repertoire->save();

        return redirect()->route('repertoire.show', ['repertoire' => $repertoire->slug]);
    }

    public function destroy($id)
    {
        \Log::info("Destroying Repertoire with id: $id");

        $repertoire = Repertoire::where('slug', $id)->first();

        if ($repertoire) {
            \Log::info("Found Repertoire: " . $repertoire->name);

            // Delete the foreign key constraint first
            DB::table('actor_repertoire')->where('repertoire_id', $repertoire->id)->delete();

            \Log::info("Deleted actor_repertoire rows");

            // Then delete the repertoire row
            $repertoire->delete();

            \Log::info("Deleted Repertoire");
        } else {
            \Log::info("Repertoire not found");
        }

        return redirect()->route('repertoire.index');
    }



    public function getRouteKeyName(): string
{
return 'slug';
}
}
