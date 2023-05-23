@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>Actors</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="mb-3">
            <a href="{{ route('actors.create') }}" class="btn btn-primary">Create Actor</a>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Birth Date</th>
                <th>Actor Type</th>
                <th>Photo</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($actors as $actor)
                <tr>
                    <td>{{ $actor->name }}</td>
                    <td>{{ $actor->birth_date }}</td>
                    <td>{{ $actor->actor_type }}</td>
                    <td>
                        @if ($actor->photo_src)
                            <img src="{{ asset($actor->photo_src) }}" alt="{{ $actor->name }}" class="img-fluid" style="max-height: 100px;">

                        @else
                            No photo available
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('actors.show', $actor) }}" class="btn btn-primary">View</a>
                        <a href="{{ route('actors.edit', $actor) }}" class="btn btn-success">Edit</a>
                        <form action="{{ route('actors.destroy', $actor) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this actor?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No actors found.</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        {{ $actors->links() }}
    </div>
@endsection
