@extends('layouts.app')
@include('layouts.navcustom2')
<body>
<main>
<form action="{{ route('events.store')}}" role="form" method="post" class="col-row g-3">
    @csrf
    <div class="row mb-3">
        <label for="header" class="col-sm-2 col-form-label">Header</label>
        <input type="text" class="form-control" id="header" name="header">
    </div>

    <div class="row mb-3">
        <label for='article' class="col-sm2 col-form-label"> article </label>
        <textarea type="text" id='article' class="form-control" name="article"> </textarea>
    </div>

    <div class="row mb-3">
        <label for="eventdate" class="col-sm-2 col-form-label">Event Date</label>
        <input type="date" class="form-control" id="eventdate" name="eventdate">
    </div>

    <div class="row mb-3">
        <button class="btn btn-primary" type="submit">Create</button>

    </div>


</form>
</main>

</body>
