@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>{{ $actor->name }}</h1>

        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset(Storage::url($actor->photo_src)) }}" alt="{{ $actor->name }}" class="img-fluid">

            </div>
            <div class="col-md-8">
                <p><strong>Birth Date:</strong> {{ $actor->birth_date }}</p>
                <p><strong>Description:</strong> {{ $actor->description }}</p>
                <p><strong>Actor Type:</strong> {{ $actor->actor_type }}</p>
                <p><strong>Text Field:</strong> {{ $actor->text_field }}</p>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('actors.index') }}" class="btn btn-primary">Back to Actors</a>
        </div>
    </div>
@endsection
