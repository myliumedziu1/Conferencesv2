@extends('layouts.layout')

@section('title', 'Your Theatre Name')

@section('content')
    <div class="event-card-container">
        @foreach ($events as $event)
            <div class="event-card">
                <div class="event-card-image">
                    <img src="{{ $event->repertoire->image_path }}" alt="Event Image">
                </div>

                <div class="event-card-content">
                    <h2 class="event-card-title">{{ $event->repertoire->event_name }}</h2>
                    <div class="event-card-details">
                        @if ($event->event_type == 'Live')
                            <p class="event-card-date">Event Date: {{ $event->event_date }}</p>
                            <p class="event-card-location">Event Location: {{ $event->location }}</p>
                        @else
                            <p class="event-card-type">Online Event</p>
                        @endif
                    </div>
                </div>

                <div class="event-card-action">
                    <a href="{{ $event->ticket_url }}">Buy Ticket</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
