@include('layouts.app')

<body>
<main>
<form action="/create" class="col-row g-3">
    @csrf
    <div class="row mb-3">
        <label for="header" class="col-sm-2 col-form-label">Header</label>
        <input type="text" class="form-control" id="header"  required>
    </div>

        <div class="row mb-3">
            <label for='summary' class="col-sm2 col-form-label"> Summary </label>
            <textarea type="text" id='summary' class='form-control' required> </textarea>
                </div>

    <div class="row mb-3">
        <label for='article' class="col-sm2 col-form-label"> article </label>
        <textarea type="text" id='article' class='form-control' required> </textarea>
    </div>

    <div class="row mb-3">
    <label for="date" class="col-sm2 col-form-label"> Date </label>
        <input type="date" id="date" class="form-control" required>

    </div>

    <div class="row mb-3">
        <button class="btn btn-primary" type="submit">Create</button>

    </div>


</form>
</main>
</body>
