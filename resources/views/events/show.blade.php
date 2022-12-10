@extends('layouts.app')
@include('layouts.navcustom2')



<div class="row">
    <div class="col-md-8">
        <h1>{{ $event->header }}</h1>

        <p class="lead">{{ $event->article }}</p>

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
                    {!! Html::linkRoute('events.destroy', 'Delete', array($event->id), array('class' => 'btn btn-danger btn-block')) !!}
                </div>
            </div>

        </div>
    </div>
</div>
