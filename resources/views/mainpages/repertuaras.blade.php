@extends('layouts.layout')

@section('title', 'Your Theatre Name')

@section('content')
    <div class="container" id="repertoire-container">
        <div class="row g-4 align-items-stretch">
            @foreach($repertoires as $repertoire)
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card position-relative repertoire-card"
                         style="background-image: url('{{ $repertoire->image_path }}');">
                        <a class="card-link d-flex flex-column" href="{{ route('repertuaras.show', ['slug' => $repertoire->event_name]) }}">
                            <div class="card-hover-info">
                                <p class="description">{!! $repertoire->brief_description !!}</p>
                            </div>
                        </a>
                    </div>
                    <h5 class="event-name text-center">{{ $repertoire->event_name }}</h5>  <!-- Event name is now outside the card -->
                </div>
            @endforeach
        </div>
    </div>
@endsection
