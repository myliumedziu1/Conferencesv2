<?php
namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Models\Repertoire;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class EventController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
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
$events = Event::with('repertoire')->paginate(10);

return view('event.index', compact('events'));
}

/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
$repertoires = Repertoire::all();

$defaultEventDate = Carbon::now()->addDay()->format('Y-m-d\TH:i');

return view('event.create', compact('repertoires', 'defaultEventDate'));
}


/**
* Store a newly created resource in storage.
*
* @param \Illuminate\Http\Request $request
* @return \Illuminate\Http\Response
*/
    public function store(EventRequest $request)
    {
        $data = $request->validated();

        $repertoire = Repertoire::findOrFail($data['repertoire_id']);

        $event = Event::create([
            'repertoire_id' => $repertoire->id,
            'slug' => $this->generateUniqueSlug($repertoire->event_name, Event::class),
            'brief_description' => $repertoire->brief_description,
            'full_description' => $repertoire->full_description,
            'image_src' => $repertoire->image_path,
            'event_date' => $data['event_date'],
            'event_type' => $data['event_type'],
            'location' => $data['location'],
            'ticket_url' => $data['ticket_url']
        ]);

        return redirect()->route('events.show', ['id' => $event->id]);
    }


    /**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
    public function show($id)
    {
        try {
            $event = Event::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('events.index')->withErrors('The event you requested was not found.');
        }

        return view('event.show', compact('event'));
    }


/**
* Show the form for editing the specified resource.
*
* @param  \App\Models\Event  $event
* @return \Illuminate\Http\Response
*/
public function edit(Event $event)
{
$repertoires = Repertoire::all();

$event->event_date = Carbon::parse($event->event_date);

return view('event.edit', compact('event', 'repertoires'));
}

/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  \App\Models\Event  $event
* @return \Illuminate\Http\Response
*/
    public function update(EventRequest $request, Event $event)
    {
        $data = $request->validated();

        $repertoire = Repertoire::findOrFail($data['repertoire_id']);

        $event->update([
            'repertoire_id' => $repertoire->id,
            'slug' => $this->generateUniqueSlug($repertoire->event_name, Event::class),
            'brief_description' => $repertoire->brief_description,
            'full_description' => $repertoire->full_description,
            'image_src' => $repertoire->image_path,
            'event_date' => $data['event_date'],
            'event_type' => $data['event_type'],
            'location' => $data['location'],
            'ticket_url' => $data['ticket_url']
        ]);

        return redirect()->route('events.show', ['id' => $event->id]);
    }


    /**
* Remove the specified resource from storage.
*
* @param  \App\Models\Event  $event
* @return \Illuminate\Http\RedirectResponse
*/
public function destroy(Event $event)
{
$event->delete();

return redirect()->route('events.index');
}
    private function generateUniqueSlug($eventName)
    {
        // Generate a slug based on the event name
        $slug = Str::slug($eventName);

        // Check if the generated slug already exists in the database
        $count = Event::where('slug', 'like', "%$slug%")->count();

        // If the slug already exists, append a unique identifier
        if ($count > 0) {
            // Use the current timestamp to ensure uniqueness
            $slug = $slug . '-' . time();
        }

        return $slug;
    }

}
