@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>Events</h1>

        <a href="{{ route('events.create') }}" class="btn btn-success mb-3">Create New Event</a>

        @foreach ($events as $event)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $event->repertoire->event_name }}</h5>
                    <p class="card-text"><strong>Type:</strong> {{ $event->event_type }}</p>
                    <p class="card-text"><strong>Description:</strong> {{ $event->brief_description }}</p>

                    <a href="{{ route('events.show', $event) }}" class="btn btn-primary">View Details</a>
                    <a href="{{ route('events.edit', $event) }}" class="btn btn-warning">Edit</a>
                    <form method="POST" action="{{ route('events.destroy', $event) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach

        {{ $events->links() }}
    </div>
@endsection
