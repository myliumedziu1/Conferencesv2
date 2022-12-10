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
</main>
<div class="container">
    <div class="card">
        <div class="card-img-top">
            <a href="#">
                <img src="https://techzity.com/app/uploads/2022/04/tech-zity-event-spaces.jpg">
            </a>
            <h2> {{$event->header}}</h2>
            <p><br> {{$event->article}}
            </p>
            <button class="btn btn-light" href="#"> View</button>
        </div>

    </div>
    <div class="card">
        <div class="card-img-top">
            <a href="#">
                <img src="https://techzity.com/app/uploads/2022/04/tech-zity-event-spaces.jpg">
            </a>
            <h2> Event 1</h2>
            <p><br> Event number 1, there should be a data of the event, thanks for attention
            </p>
            <button class="btn btn-light" href="#"> View</button>
        </div>

    </div>

    <div class="card">
        <div class="card-img-top">
            <a href="#">
                <img src="https://techzity.com/app/uploads/2022/04/tech-zity-event-spaces.jpg">
            </a>
            <h2> Event 1</h2>
            <p><br> Event number 1, there should be a data of the event, thanks for attention
            </p>
            <button class="btn btn-light" href="#"> View</button>
        </div>

    </div>

    <div class="card">
        <div class="card-img-top">
            <a href="#">
                <img src="https://techzity.com/app/uploads/2022/04/tech-zity-event-spaces.jpg">
            </a>
            <h2> Event 1</h2>
            <p><br> Event number 1, there should be a data of the event, thanks for attention
            </p>
            <button class="btn btn-light" href="#"> View</button>
        </div>
    </div>
    <div class="card">
        <div class="card-img-top">
            <a href="#">
                <img src="https://techzity.com/app/uploads/2022/04/tech-zity-event-spaces.jpg">
            </a>
            <h2> Event 1</h2>
            <p><br> Event number 1, there should be a data of the event, thanks for attention
            </p>
            <button class="btn btn-light" href="#"> View</button>
        </div>

    </div>

</div>

</body>
</html>
