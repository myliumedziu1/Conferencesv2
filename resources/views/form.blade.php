@extends('layouts.app')
@include('layouts.navcustom2')
<body>
<main>

<form action="/submit" method="POST" class="row g-3">
    @csrf
    <div class="row mb-3">
        <label for="name" class="col-sm-2 col-form-label">First name</label>
        <input type="text" class="form-control" id="name"  required>
    </div>
    <div class="row mb-3">
        <label for="surname" class="col-sm-2 col-form-label">Last name</label>
        <input type="text" class="form-control" id="surname"  required>
    </div>
    <div class="row mb-3">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
            <input type="email" class="form-control" id="email" required>

    </div>
    <div class="row mb-3">
        <label for="phone" class="col-sm-2 col-form-label">Phone number</label>
        <input type="number" class="form-control" id="phone" required>
    </div>

    <div class="row mb-3">
        <button class="btn btn-primary" type="submit">Submit form</button>
    </div>
</form>

</main>

</body>
