@extends('layouts.app')

@section('content')
    <div class="h-full p-8 md:grid md:grid-cols-12 gap-4 overflow-hidden">
        <div class="col-span-7 h-1/2 md:h-full overflow-hidden">
            <form id="search" action="#" method="get" class="flex pb-2 gap-3">
                <button class="cursor-pointer flex big-shoulders-light text-xs sm:text-base text-gray-400 sortBy">Sort by name</button>
                <button class="cursor-pointer flex big-shoulders-light text-xs sm:text-base text-gray-400 sortBy">Sort by rarity</button>
                <button class="cursor-pointer flex big-shoulders-light text-xs sm:text-base text-gray-400 sortBy">Sort by price</button>
                <x-text-input type="text" placeholder="Search" id="searchInput" class="bg-gray-700 px-2 !rounded-2xl border-none big-shoulders-light"></x-text-input>
            </form>
            <div id="skins" class="h-full pb-8 grid grid-cols-2 lg:grid-cols-3 gap-2 perspective-distant overflow-y-auto overflow-x-hidden scrollbar">
                @foreach($skins as $skin)
                    <div @class([
                    'skin',
                    'transform-3d hover:rotate-x-20 hover:rotate-y-2 hover:rotate-z-2 bg-linear-65 transition cursor-pointer border flex flex-col items-center h-full relative',
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
        </div>

        <div class="col-span-5 pt-4 md:pt-0">
            <div class="border border-gray-200 h-full">
                <img id="hud" class="h-full object-cover" src="{{ asset('storage/hudexample.jpg') }}" alt="hud">
            </div>
        </div>
    </div>
    <script>
        $(document).on('mouseenter', '.skin', function () {
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
        }).on('mouseleave', '.skin', function () {
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
        }).on('click', '.skin', function () {
            $('.skin').removeClass('bg-slate-200');
            $(this).toggleClass('bg-slate-200');
        });

        let sort = 'none';
        let order = 'none';
        $('.sortBy').on('click', function () {
            let thisSort = $(this);
            sort = thisSort.index() === 0 ? 'name' : thisSort.index() === 1 ? 'rarity' : 'price';
            $('.sortBy').not($(this)).removeClass('!text-blue-700').children().remove();
            thisSort.addClass('!text-blue-700');
            if (thisSort.children().text() === 'arrow_drop_up') {
                thisSort.children().remove();
                thisSort.html('<span class="material-symbols-outlined !text-sm sm:!text-base">arrow_drop_down</span>' + thisSort.text());
                order = 'desc';
            } else if(thisSort.children().text() === 'arrow_drop_down') {
                thisSort.children().remove();
                thisSort.removeClass('!text-blue-700');
                order = 'none';
            } else {
                thisSort.html('<span class="material-symbols-outlined !text-sm sm:!text-base">arrow_drop_up</span>' + thisSort.text());
                order = 'asc';
            }
            updateCatalog($('#searchInput').val(), sort, order);
        })

        $('#search').on('submit', function (e) {
            e.preventDefault();
        });

        $('#searchInput').on('input', function () {
            let searchInput = $(this).val() ? $(this).val() : '';
            updateCatalog(searchInput, sort, order);
        });

        function updateCatalog(searchQuery, sortBy, orderBy) {
            $.get('api/skins', {
                searchQuery: searchQuery,
                sortBy: sortBy,
                orderBy: orderBy,
            }, function (data) {
                $('#skins').empty();
                $.each(data, function (key, value) {
                    let containerClass = {
                        'common': 'border-slate-200 to-slate-200/25 hover:from-slate-400/75',
                        'uncommon': 'border-blue-200 to-blue-200/25 hover:from-blue-400/75',
                        'rare': 'border-blue-500 to-blue-500/25 hover:from-blue-700/75',
                        'mythical': 'border-violet-500 to-violet-500/25 hover:from-violet-700/75',
                        'legendary': 'border-fuchsia-500 to-fuchsia-500/25 hover:from-fuchsia-700/75',
                        'ancient': 'border-red-500 to-red-500/25 hover:from-red-700/75',
                        'exceedingly rare': 'border-amber-500 to-amber-500/25 hover:from-amber-700/75',
                        'immortal': 'border-amber-500 to-amber-500/25 hover:from-amber-700/75',
                    };
                    let textClass = {
                        'common': 'bg-slate-300',
                        'uncommon': 'bg-blue-300',
                        'rare': 'bg-blue-600',
                        'mythical': 'bg-violet-600',
                        'legendary': 'bg-fuchsia-600',
                        'ancient': 'bg-red-600',
                        'exceedingly rare': 'bg-amber-600',
                        'immortal': 'bg-amber-600',
                    }
                    $('#skins').append(`
                            <div id="${value['picture'].split('.')[0]}" class="skin transform-3d hover:rotate-x-20 hover:rotate-y-2 hover:rotate-z-2 bg-linear-65 transition cursor-pointer border flex flex-col items-center h-full relative ${containerClass[value['rarity']]}">
                                <div class="bebas-neue-regular bg-clip-text bg-linear-65 text-transparent transition text-3xl ps-1 ${textClass[value['rarity']]}">
                                    ${value['name']}
                                </div>
                                <img class="h-24" src="storage/${value['picture']}" alt="${value['picture']}">
                                <div class="absolute bottom-0 right-0 m-2 p-1 rounded-lg text-slate-400 bg-slate-700 big-shoulders-light">$${value['price']}</div>
                            </div>
                    `);
                });
            });
        }
    </script>
@endsection
