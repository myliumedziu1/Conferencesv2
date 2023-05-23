
@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>Edit Actor</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('actors.update', $actor) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $actor->name) }}" required>
            </div>

            <div class="form-group">
                <label for="birth_date">Birth Date</label>
                <input type="date" name="birth_date" id="birth_date" class="form-control" value="{{ old('birth_date', $actor->birth_date) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $actor->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" name="photo" id="photo" class="form-control-file">
            </div>

            <div class="form-group">
                <label for="actor_type">Actor Type</label>
                <select name="actor_type" id="actor_type" class="form-control" required>
                    <option value="regular" {{ old('actor_type', $actor->actor_type) === 'regular' ? 'selected' : '' }}>Regular</option>
                    <option value="guest" {{ old('actor_type', $actor->actor_type) === 'guest' ? 'selected' : '' }}>Guest</option>
                </select>
            </div>

            <div class="form-group">
                <label for="text_field">Text Field</label>
                <textarea name="text_field" id="text_field" class="form-control" rows="4">{{ old('text_field', $actor->text_field) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
