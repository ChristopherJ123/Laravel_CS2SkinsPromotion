<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Big+Shoulders:opsz,wght@10..72,100..900&display=swap" rel="stylesheet">    <style>
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
    </style>
</head>
<body>
    <div class="flex flex-col h-screen w-full bg-gradient-to-b from-gray-900 via-gray-800 to-gray-950">
        @include('layouts.navigation')
        <div class="h-full p-8 md:grid md:grid-cols-12 gap-4 overflow-hidden">
            <div class="col-span-7 h-1/2 md:h-full grid grid-cols-2 lg:grid-cols-3 gap-2 overflow-auto scrollbar">
            @foreach($skins as $skin)
                    <div @class([
                        'skin',
                        'bg-linear-65 transition cursor-pointer border flex flex-col items-center h-full relative',
                        'border-slate-200 to-slate-200/25 hover:from-slate-400/75' => $skin['rarity'] == 'common',
                        'border-blue-200 to-blue-200/25 hover:from-blue-400/75' => $skin['rarity'] == 'uncommon',
                        'border-blue-500 to-blue-500/25 hover:from-blue-700/75' => $skin['rarity'] == 'rare',
                        'border-violet-500 to-violet-500/25 hover:from-violet-700/75' => $skin['rarity'] == 'mythical',
                        'border-fuchsia-500 to-fuchsia-500/25 hover:from-fuchsia-700/75' => $skin['rarity'] == 'legendary',
                        'border-red-500 to-red-500/25 hover:from-red-700/75' => $skin['rarity'] == 'ancient',
                        'border-amber-500 to-amber-500/25 hover:from-amber-700/75' => $skin['rarity'] == 'immortal',
                    ]) id="{{ explode('.', $skin['picture'])[0] }}">
                        <div @class([
                            'bebas-neue-regular',
                            'bg-clip-text bg-linear-65 text-transparent transition text-3xl ps-1',
                            'bg-slate-300' => $skin['rarity'] == 'common',
                            'bg-blue-300' => $skin['rarity'] == 'uncommon',
                            'bg-blue-600' => $skin['rarity'] == 'rare',
                            'bg-violet-600' => $skin['rarity'] == 'mythical',
                            'bg-fuchsia-600' => $skin['rarity'] == 'legendary',
                            'bg-red-600' => $skin['rarity'] == 'ancient',
                            'bg-amber-600' => $skin['rarity'] == 'immortal',
                        ])>{{ $skin['name'] }}</div>
                        <img class="h-24" src="{{ asset('storage/'.$skin['picture']) }}" alt="{{ $skin['picture'] }}">
                        <div class="absolute bottom-0 right-0 m-2 p-1 rounded-lg text-slate-400 bg-slate-700 big-shoulders-light">${{ $skin['price'] }}</div>
                    </div>
            @endforeach
            </div>
            <div class="col-span-5 pt-4 md:pt-0">
                <div class="border border-gray-200 h-full">
                    <img id="hud" class="h-full object-cover" src="{{ asset('storage/hudexample.jpg') }}" alt="hud">
                </div>
            </div>
        </div>
    </div>
    <script>
        $('.skin').mouseenter(function () {
            let child = $(this).children().first();
            if (child.hasClass('bg-slate-300')) {
                child.toggleClass('bg-slate-300 bg-slate-200 from-slate-100');
            } else if (child.hasClass('bg-blue-200')) {
                child.toggleClass('bg-blue-300 bg-blue-200 from-blue-100');
            } else if (child.hasClass('bg-blue-600')) {
                child.toggleClass('bg-blue-600 bg-blue-500 from-blue-200');
            } else if (child.hasClass('bg-violet-600')) {
                child.toggleClass('bg-violet-600 bg-violet-500 from-violet-200');
            } else if (child.hasClass('bg-fuchsia-600')) {
                child.toggleClass('bg-fuchsia-600 bg-fuchsia-500 from-fuchsia-200');
            } else if (child.hasClass('bg-red-600')) {
                child.toggleClass('bg-red-600 bg-red-500 from-red-200');
            } else if (child.hasClass('bg-amber-600')) {
                child.toggleClass('bg-amber-600 bg-amber-500 from-amber-200');
            }
            $('#hud').attr('src', 'storage/' + $(this).attr('id') + '_hud.jpg');
        }).mouseleave(function () {
            let child = $(this).children().first();
            if (child.hasClass('bg-slate-200')) {
                child.toggleClass('bg-slate-300 bg-slate-200 from-slate-100');
            } else if (child.hasClass('bg-blue-200')) {
                child.toggleClass('bg-blue-300 bg-blue-200 from-blue-100');
            } else if (child.hasClass('bg-blue-500')) {
                child.toggleClass('bg-blue-600 bg-blue-500 from-blue-200');
            } else if (child.hasClass('bg-violet-500')) {
                child.toggleClass('bg-violet-600 bg-violet-500 from-violet-200');
            } else if (child.hasClass('bg-fuchsia-500')) {
                child.toggleClass('bg-fuchsia-600 bg-fuchsia-500 from-fuchsia-200');
            } else if (child.hasClass('bg-red-500')) {
                child.toggleClass('bg-red-600 bg-red-500 from-red-200');
            } else if (child.hasClass('bg-amber-500')) {
                child.toggleClass('bg-amber-600 bg-amber-500 from-amber-200');
            }
        }).on('click', function () {
            $('.skin').removeClass('bg-slate-200')
            $(this).toggleClass('bg-slate-200')
        });
    </script>
</body>
</html>
