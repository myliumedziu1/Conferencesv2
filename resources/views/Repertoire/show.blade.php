@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>Event Name: {{ $repertoire->event_name }}</h1>
        <p>Brief Description: {!! $repertoire->brief_description !!}</p>
        <p>Full Description: {!! $repertoire->full_description !!} </p>

        <p>Actors:
            @if ($repertoire->actors)
                @foreach($repertoire->actors as $actor)
                    {{ $actor->name }}@if(!$loop->last), @endif
                @endforeach
            @endif
        </p>

        <td>
            @if ($repertoire->image_path)
                <img src="{{ $repertoire->image_path }}" alt="{{ $repertoire->event_name }}">
            @endif
        </td>

        <div class="mt-4">
            <a href="{{ route('repertoire.index') }}" class="btn btn-primary">Back to Repertoire</a>
            <a href="{{ route('repertoire.edit', $repertoire->slug) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('repertoire.destroy', $repertoire->slug) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this repertoire?')">Delete</button>
            </form>
        </div>
    </div>
@endsection
