@extends('layouts.layout')

@section('content')
    <div class="container">
        <form action="{{ route('events.update', $event) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Select Repertoire -->
            <div class="form-group">
                <label for="repertoire_id">Repertoire</label>
                <select class="form-control" id="repertoire_id" name="repertoire_id" required>
                    @foreachMy apologies for the abrupt end of the previous response. Here is the complete `edit.blade.php`:

                    ```html
                    @extends('layouts.layout')

                    @section('content')
                        <div class="container">
                            <form action="{{ route('events.update', $event) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Select Repertoire -->
                                <div class="form-group">
                                    <label for="repertoire_id">Repertoire</label>
                                    <select class="form-control" id="repertoire_id" name="repertoire_id" required>
                                        @foreach($repertoires as $repertoire)
                                            <option value="{{ $repertoire->id }}" {{ $event->repertoire_id == $repertoire->id ? 'selected' : '' }}>{{ $repertoire->event_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Event Type -->
                                <div class="form-group">
                                    <label for="event_type">Event Type</label>
                                    <select class="form-control" id="event_type" name="event_type" required onchange="window.toggleEventFields()">
                                        <option value="Live" {{ $event->event_type == 'Live' ? 'selected' : '' }}>Live</option>
                                        <option value="Online" {{ $event->event_type == 'Online' ? 'selected' : '' }}>Online</option>
                                    </select>
                                </div>

                                <!-- Location -->
                                <div class="form-group" id="location_field">
                                    <label for="location">Location</label>
                                    <input type="text" class="form-control" id="location" name="location" value="{{ $event->location }}">
                                </div>

                                <!-- Event Date -->
                                <div class="form-group" id="event_date_field">
                                    <label for="event_date">Event Date</label>
                                    <input type="datetime-local" class="form-control" id="event_date" name="event_date" value="{{ $event->event_date }}">
                                </div>

                                <!-- Ticket URL -->
                                <div class="form-group">
                                    <label for="ticket_url">Ticket URL</label>
                                    <input type="text" class="form-control" id="ticket_url" name="ticket_url" required value="{{ $event->ticket_url }}">
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    @endsection

                    @section('scripts')
                        <script>
                            window.addEventListener('DOMContentLoaded', (event) => {
                                window.toggleEventFields();
                            });
                        </script>
@endsection
