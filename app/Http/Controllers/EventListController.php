<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\EventList;
use Illuminate\Http\Request;

class EventListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $events = EventList::all();
       return view('events.index')->withEvents($events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'header' => 'required|max:255',
            'article'  => 'required|min:20',
            'eventdate' => 'required|date',
            'address' =>'required|min:5'
        ));

        // store in the database
        $event = new EventList;

        $event->header = $request->header;
        $event->article = $request->article;
        $event->eventdate = $request->eventdate;
        $event->address = $request->address;
        $event->save();

        return redirect()->route('events.show', $event->id);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = EventList::find($id);
        return view('events.show')->withEvent($event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = EventList::find($id);
        return view('events.edit')->withEvent($event);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'header' => 'required|max:255',
            'article'  => 'required|min:20',
            'eventdate' => 'required|date',
            'address' => 'required|min:5',
        ));
        $event = EventList::find($id);

        $event->header = $request->header;
        $event->article = $request->article;
        $event->eventdate = $request->eventdate;
        $event->address = $request->address;
        $event->save();

        return redirect('events.index')->withEvent($event);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $event= EventList::find($id);
       $event->delete();

       return redirect()->route('events.index');
    }
}
