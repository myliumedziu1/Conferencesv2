@extends('layouts.app')
@include('layouts.navcustom2')

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<main>
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
        <div class="col-md-5 p-lg-5 mx-auto my-5">
            <h1 class="display-4 fw-normal">Upcomming Conferences</h1>
            <p class="lead fw-normal">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            <a class="btn btn-outline-secondary" href="#">Check it out</a>
        </div>
    </div>

    <div class="container">
        @csrf
        @foreach($events as $event)
        <div class="card-img-top ">
            <div class="card">
                    <img src="https://techzity.com/app/uploads/2022/04/tech-zity-event-spaces.jpg">
                <h2>{{$event->header}}</h2>
                <p><br>{{ substr($event->article, 0, 20) }}{{ strlen($event->articles) > 20 ? "..." : "" }}</p>
                <p><br> {{$event->address}}</p>
                <p><br> {{$event->eventdate}}</p>
                <a href="/submit">
                <button class="btn btn-secondary" > Register </button>
                    </a>
                @if (Auth::check())
                    <a href="{{route('events.index')}}">
                        <button class="btn btn-primary" type="button"> Edit </button>
                @else

                @endif
            </div>
    @endforeach
        </div>
    </div>
</main>

</body>
