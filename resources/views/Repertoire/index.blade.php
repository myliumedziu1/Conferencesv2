@extends('layouts.layout')

@section('content')
    <div class="container">
        <h2>Repertoire</h2>
        <hr>
        <div class="mb-3">
            <a href="{{ route('repertoire.create') }}" class="btn btn-success">Create</a>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>Event Name</th>
                <th>Brief Description</th>
                <th>Full Description</th>
                <th>Actors</th>
                <th>Image</th>
                <th>Link</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($repertoires as $repertoire)
                <tr>
                    <td>{{ $repertoire->event_name }}</td>
                    <td>{!! $repertoire->brief_description !!}</td>
                    <td>{!! $repertoire->full_description !!}</td>
                    <td>
                        @if ($repertoire->actors)
                            {{ implode(', ', $repertoire->actors->pluck('name')->toArray()) }}
                        @endif
                    </td>
                    <td>
                        @if ($repertoire->image_path)
                            <img src="{{ $repertoire->image_path }}" alt="{{ $repertoire->event_name }}" style="max-width: 100px;">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('repertoire.show', $repertoire->slug) }}">{{ $repertoire->slug }}</a>
                    </td>
                    <td>
                        <a href="{{ route('repertoire.show', $repertoire->slug) }}" class="btn btn-primary">Show</a>
                        <a href="{{ route('repertoire.edit', $repertoire->slug) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('repertoire.destroy', $repertoire->slug) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this repertoire?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $repertoires->links() }}
    </div>
@endsection
