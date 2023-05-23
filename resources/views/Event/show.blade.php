@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>{{ $event->repertoire->event_name }}</h1>
        <p><strong>Type:</strong> {{ $event->event_type }}</p>
        <p><strong>Description:</strong> {{ $event->brief_description }}</p>
        <p><strong>Actors:</strong> {{ $event->repertoire->actors }}</p>

        @if($event->event_type == 'Live')
            <p><strong>Location:</strong> {{ $event->location }}</p>
            <p><strong>Date:</strong> {{ $event->event_date }}</p>
        @endif

        <a href="{{ $event->ticket_url }}" target="_blank" class="btn btn-primary">Ticket</a>
    </div>
@endsection
