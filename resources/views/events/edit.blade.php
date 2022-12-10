@extends ('layouts.app')
<div class="row">
    <div class="row">
        {!! Form::model($event, ['route' => ['events.update', $event->id]]) !!}
        <div class="col-md-8">article
            {{ Form::label('header', 'header:') }}
            {{ Form::text('header', null, ["class" => 'form-control input-lg']) }}

            {{ Form::label('article', "article:", ['class' => 'form-spacing-top']) }}
            {{ Form::textarea('article', null, ['class' => 'form-control']) }}

            {{ Form::label('eventdate', "eventdate:", ['class' => 'form-spacing-top']) }}
            {{ Form::textarea('eventdate', null, ['class' => 'form-control']) }}

            {{ Form::label('address', "address:", ['class' => 'form-spacing-top']) }}
            {{ Form::textarea('address', null, ['class' => 'form-control']) }}
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
                        {!! Html::linkRoute('events.index', 'Cancel', array($event->id), array('class' => 'btn btn-danger btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Html::linkRoute('events.update', 'Save Changes', array($event->id), array('class' => 'btn btn-success btn-block')) !!}
                    </div>
                </div>

            </div>
        </div>
        {!! Form::close() !!}
    </div>	<!-- end of .row (form) -->
