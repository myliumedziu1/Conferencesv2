<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>Theatre Website</title>
</head>
<body>
<header>
    @include('partials.navbar')
</header>
<main>
    @yield('content')
</main>
<footer>
    @include('partials.footer')
</footer>
<script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
</body>
</html>
