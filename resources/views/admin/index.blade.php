<!-- resources/views/admin/index.blade.php -->

@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Admin Panel</h1>
                <ul>
                    <li><a href="{{ route('admin.repertoire.index') }}">Repertoire</a></li>
                    <li><a href="{{ route('admin.actor.index') }}">Actor</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
