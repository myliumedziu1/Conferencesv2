<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>



    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>


<header class="site-header sticky-top py-1">
    <nav class="container-fluid d-flex flex-column flex-md-row justify-content-between">
        <a class="py-2" href="#" aria-label="Product">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img" viewBox="0 0 24 24"><title>Product</title><circle cx="12" cy="12" r="10"/><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/></svg>
        </a>
        <a class="py-2 d-none d-md-inline-block" href="#">Lorem Ipsum</a>
        <a class="py-2 d-none d-md-inline-block" href="#">Lorem Ipsum</a>
        <a class="py-2 d-none d-md-inline-block" href="#">Lorem Ipsum</a>
        <a class="py-2 d-none d-md-inline-block" href="#">Lorem Ipsum</a>
        <a class="py-2 d-none d-md-inline-block" href="#">Lorem Ipsum</a>
        <a class="py-2 d-none d-md-inline-block" href="#">Lorem Ipsum</a>
        <a class="py-2 d-none d-md-inline-block" href="{{route('events.create')}}">Create event</a>
        @if (Route::has('login'))
            <div>
                @auth
                    <a href="{{ route('logout') }}" class="py-2 d-none d-md-inline-block">Log Out </a>
                @else
                    <a href="{{ route('login') }}" class="py-2 d-none d-md-inline-block">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="py-2 d-none d-md-inline-block">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </nav>

</header>



<script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
</body>
</html>
