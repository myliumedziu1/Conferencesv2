@extends('layouts.app')
@include('layouts.navcustom2')

<div class="row">
    <div class="col-md-10">
        <h1>All Conferences</h1>
    </div>

    <div class="col-md-2">
        <a href="{{ route('events.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create New Conference</a>
    </div>
    <div class="col-md-12">
        <hr>
    </div>
</div> <!-- end of .row -->

<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
            <th>#</th>
            <th>Title</th>
            <th>Body</th>
            <th>Event date</th>
            <th>Created At</th>
            <th></th>
            </thead>

            <tbody>

            @foreach ($events as $event)

                <tr>
                    <th>{{ $event->id }}</th>
                    <td>{{ $event->header }}</td>
                    <td>{{ substr($event->article, 0, 50) }}{{ strlen($event->articles) > 50 ? "..." : "" }}</td>
                    <td>{{ date('M j, Y', strtotime($event->eventdate)) }}</td>
                    <td>{{ date('M j, Y', strtotime($event->created_at)) }}</td>
                    <td><a href="{{ route('events.show', $event->id) }}" class="btn btn-default btn-sm">View</a> <a href="{{ route('events.edit', $event->id) }}" class="btn btn-default btn-sm">Edit</a></td>
                </tr>

            @endforeach

            </tbody>
        </table>
    </div>
</div>
