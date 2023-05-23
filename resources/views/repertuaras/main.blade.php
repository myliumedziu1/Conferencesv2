@extends('layouts.layout')

@section('content')
    <div class="container">
        <h2>{{ $repertoire->event_name }}</h2>
        <hr>
        <div class="row">
            <div class="col-md-4">
                @if ($repertoire->image_path)
                    <img src="{{ url('storage/images/repertoires/' . $repertoire->image_path) }}" alt="{{ $repertoire->event_name }}" >
                @endif
            </div>
            <div class="col-md-8">
                <h5>Brief Description:</h5>
                <p>{!! $repertoire->brief_description !!}</p>
                <h5>Full Description:</h5>
                <p>{!! $repertoire->full_description !!}</p>
                <h5>Actors:</h5>
                <ul>
                    @foreach ($repertoire->actors as $actor)
                        <li>{{ $actor->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
