@extends('layouts.app')
@include('layouts.navcustom2')
<div class="row">
    {!! Form::model($event, ['route' => ['events.update', $event->id]]) !!}
    <div class="col-md-8">
        {{ Form::label('header', 'Header:') }}
        {{ Form::text('header', null, ["class" => 'form-control input-lg']) }}

        {{ Form::label('article', "Article:", ['class' => 'form-spacing-top']) }}
        {{ Form::textarea('article', null, ['class' => 'form-control']) }}

        {{ Form::label('eventdate', "eventdate:", ['class' => 'form-spacing-top']) }}
        {{ Form::date('eventdate', null, ['class' => 'form-control']) }}

    </div>

    <div class="col-md-4">
        <div class="well">
            <dl class="dl-horizontal">
                <dt>Created At:</dt>
                <dd>{{ date('M j, Y h:ia', strtotime($event->created_at)) }}</dd>
            </dl>

            <dl class="dl-horizontal">
                <dt>Last Updated:</dt>
                <dd>{{ date('M j, Y h:ia', strtotime($event->updated_at)) }}</dd>
            </dl>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    {!! Html::linkRoute('events.show', 'Cancel', array($event->id), array('class' => 'btn btn-danger btn-block')) !!}
                </div>
                <div class="col-sm-6">
                    {!! Html::linkRoute('events.update', 'Save Changes', array($event->id), array('class' => 'btn btn-success btn-block')) !!}
                </div>
            </div>

        </div>
    </div>
    {!! Form::close() !!}
</div>	<!-- end of .row (form) -->
