<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Big+Shoulders:opsz,wght@10..72,100..900&family=Caveat:wght@400..700&display=swap" rel="stylesheet">
    <style>
        .bebas-neue-regular {
            font-family: "Bebas Neue", sans-serif;
            font-weight: 400;
            font-style: normal;
        }
        .big-shoulders-light {
            font-family: "Big Shoulders", sans-serif;
            font-optical-sizing: auto;
            font-weight: 300;
            font-style: normal;
        }
        .big-shoulders-bold {
            font-family: "Big Shoulders", sans-serif;
            font-optical-sizing: auto;
            font-weight: 500;
            font-style: normal;
        }
        .caveat-light {
                     font-family: "Caveat", cursive;
                     font-optical-sizing: auto;
                     font-weight: 400;
                     font-style: normal;
                 }
        .material-symbols-outlined {
         font-variation-settings:
             'FILL' 0,
             'wght' 400,
             'GRAD' 0,
             'opsz' 24;
        }
    </style>
</head>
<body>
<div class="flex flex-col h-screen w-full bg-gradient-to-b from-gray-900 via-gray-800 to-gray-950">
    @include('layouts.navigation')

    @yield('content')
</div>
</body>
</html>
