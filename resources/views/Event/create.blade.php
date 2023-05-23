@extends('layouts.layout')

@section('content')
    <div class="container">
        <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Select Repertoire -->
            <div class="form-group">
                <label for="repertoire_id">Repertoire</label>
                <select class="form-control" id="repertoire_id" name="repertoire_id" required>
                    @foreach($repertoires as $repertoire)
                        <option value="{{ $repertoire->id }}">{{ $repertoire->event_name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Event Type -->
            <div class="form-group">
                <label for="event_type">Event Type</label>
                <select class="form-control" id="event_type" name="event_type" required onchange="window.toggleEventFields()">
                    <option value="Live">Live</option>
                    <option value="Online">Online</option>
                </select>
            </div>

            <!-- Location -->
            <div class="form-group" id="location_field">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location">
            </div>

            <!-- Event Date -->
            <div class="form-group" id="event_date_field">
                <label for="event_date">Event Date</label>
                <input type="datetime-local" class="form-control" id="event_date" name="event_date">
            </div>

            <!-- Ticket URL -->
            <div class="form-group">
                <label for="ticket_url">Ticket URL</label>
                <input type="text" class="form-control" id="ticket_url" name="ticket_url" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
