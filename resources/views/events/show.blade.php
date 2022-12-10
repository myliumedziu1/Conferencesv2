@extends('layouts.app')
@include('layouts.navcustom2')
<div class="row">
    <div class="col-md-8">
        <h1>{{ $event->header }}</h1>

        <p class="lead">{{ $event->article }}</p>

        <p class="lead">{{ $event->address }}</p>
    </div>

    <div class="col-md-4">
        <div class="well">
            <dl class="dl-horizontal">
                <dt>Create At:</dt>
                <dd>{{ date('M j, Y h:ia', strtotime($event->created_at)) }}</dd>
            </dl>

            <dl class="dl-horizontal">
                <dt>Last Updated:</dt>
                <dd>{{ date('M j, Y h:ia', strtotime($event->updated_at)) }}</dd>
            </dl>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    {!! Html::linkRoute('events.edit', 'Edit', array($event->id), array('class' => 'btn btn-primary btn-block')) !!}
                </div>
               <div class="col-sm-6">
                @csrf
                @method('delete')
                   <td form action="{{ route ('events.destroy', $event->id) }}"></td>
                <button class="btn btn-danger" type="submit"> Delete </button>
                </div>
            </div>

        </div>
    </div>
</div>
