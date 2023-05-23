@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>Edit Repertoire</h1>
        <form method="POST" action="{{ route('repertoire.update', $repertoire->slug) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="event_name">Event Name</label>
                <input type="text" class="form-control" id="event_name" name="event_name" value="{{ old('event_name', $repertoire->event_name) }}">
                @error('event_name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="brief_description">Brief Description</label>
                <div id="brief_description-editor" style="height: 200px;">{{ old('brief_description') }}</div> <!-- Quill editor -->
                <textarea name="brief_description" id="brief_description" style="display: none;"></textarea> <!-- Hidden textarea to hold the value -->
                @error('brief_description')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="full_description">Full Description</label>
                <div id="full_description-editor" style="height: 200px;">{{ old('full_description') }}</div> <!-- Quill editor -->
                <textarea name="full_description" id="full_description" style="display: none;"></textarea> <!-- Hidden textarea to hold the value -->
                @error('full_description')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="book">Book</label>
                <div id="book-editor" style="height: 200px;">{{ old('book') }}</div> <!-- Quill editor -->
                <textarea name="book" id="book" style="display: none;"></textarea> <!-- Hidden textarea to hold the value -->
                @error('book')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="bookauthor">Book Author</label>
                <div id="bookauthor-editor" style="height: 200px;">{{ old('bookauthor') }}</div> <!-- Quill editor -->
                <textarea name="bookauthor" id="bookauthor" style="display: none;"></textarea> <!-- Hidden textarea to hold the value -->
                @error('bookauthor')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="additional1">Additional if needed</label>
                <div id="additional1-editor" style="height: 200px;">{{ old('additional1') }}</div> <!-- Quill editor -->
                <textarea name="additional1" id="additional1" style="display: none;"></textarea> <!-- Hidden textarea to hold the value -->
                @error('additional1')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="additional2">Additional if needed</label>
                <div id="additional2-editor" style="height: 200px;">{{ old('additional2') }}</div> <!-- Quill editor -->
                <textarea name="additional2" id="additional2" style="display: none;"></textarea> <!-- Hidden textarea to hold the value -->
                @error('additional2')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
                @error('image')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="actor_ids">Actors</label>
                <select class="js-example-basic-multiple" id="actor_ids" name="actor_ids[]" multiple="multiple">
                    @foreach ($actors as $actor)
                        <option value="{{ $actor->id }}" {{ in_array($actor->id, old('actor_ids', $repertoire->actors->pluck('id')->toArray())) ? 'selected' : '' }}>
                            {{ $actor->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
@endsection
