<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Basic Layout')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="bg-gray-100">
<!-- Header -->
@include('partials.header')


    <div>
        <!-- Sidebar -->
@include('partials.sidebar')

        <!-- Main content -->
        <main class="col">
            @yield('content')
        </main>
    </div>


<!-- Footer -->

<script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
</body>
</html>
