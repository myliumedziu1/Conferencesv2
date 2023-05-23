@extends('layouts.layout')

@section('content')
    <div class="container actor-container mt-4"> <!-- Added actor-container class -->
        <div class="row gx-2"> <!-- Reduced horizontal gutters with gx-2 -->
            @foreach ($actors as $actor)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-2"> <!-- Reduced vertical gap with mb-2 -->
                    <div class="actor-card">
                        <div class="actor-image" style="background-image: url('{{ $actor->photo_src }}')"></div>
                        <div class="actor-content">
                            <h3 class="actor-name">{{ $actor->name }}</h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
