<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public array $skins = [
        [
            'name' => 'M4A1-S | Fade',
            'picture' => 'm4a1_s_fade.png',
            'price' => '469.67',
            'rarity' => 'ancient',
        ],
        [
            'name' => 'Karambit | Autotronic',
            'picture' => 'karambit_autotronic.webp',
            'price' => '2300.00',
            'rarity' => 'ancient',
        ],
        [
            'name' => 'CZ75-Auto | Slalom',
            'picture' => 'cz75_slalom.png',
            'price' => '7.14',
            'rarity' => 'mythical',
        ],
        [
            'name' => 'P90 | Attack Vector',
            'picture' => 'p90_attack_vector.png',
            'price' => '6.55',
            'rarity' => 'mythical',
        ],
        [
            'name' => 'M4A1 | Howl',
            'picture' => 'm4a1_howl.webp',
            'price' => '4400.00',
            'rarity' => 'immortal',
        ],
        [
            'name' => 'Negev | Mjölnir',
            'picture' => 'negev_mjolnir.webp',
            'price' => '2100.00',
            'rarity' => 'legendary',
        ],
        [
            'name' => 'AWP | Wildfire',
            'picture' => 'awp_wildfire.webp',
            'price' => '50.80',
            'rarity' => 'ancient',
        ],
        [
            'name' => 'Desert Eagle | Starcade',
            'picture' => 'deagle_starcade.png',
            'price' => '469.67',
            'rarity' => 'legendary',
        ],
        [
            'name' => 'M4A1-S | Vaporwave',
            'picture' => 'm4a1_s_vaporwave.png',
            'price' => '111.54',
            'rarity' => 'ancient',
        ],
        [
            'name' => 'M4A1-S | Chantico\'s Fire',
            'picture' => 'm4a1_s_chanticos_fire.webp',
            'price' => '23.68',
            'rarity' => 'ancient',
        ],
        [
            'name' => 'Glock | Axia',
            'picture' => 'glock_axia.png',
            'price' => '46.77',
            'rarity' => 'legendary',
        ],
        [
            'name' => 'AK-47 | The Outsiders',
            'picture' => 'ak47_the_outsiders.png',
            'price' => '11.93',
            'rarity' => 'mythical',
        ],
        [
            'name' => 'USP-S | Alpine Camo',
            'picture' => 'usp_alpine_camo.png',
            'price' => '1.82',
            'rarity' => 'rare',
        ],
        [
            'name' => 'AWP | Hydra',
            'picture' => 'awp_dessert_hydra.webp',
            'price' => '1725.00',
            'rarity' => 'ancient',
        ],
        [
            'name' => 'P250 | Facility Draft',
            'picture' => 'p250_facility_draft.webp',
            'price' => '0.03',
            'rarity' => 'common',
        ],
        [
            'name' => 'AK47 | Wild Lotus',
            'picture' => 'ak47_wild_lotus.webp',
            'price' => '14990.00',
            'rarity' => 'ancient',
        ],
        [
            'name' => 'AWP | Gungnir',
            'picture' => 'awp_gungnir.webp',
            'price' => '6890.00',
            'rarity' => 'ancient',
        ],
        [
            'name' => 'MP9 | Wild Lily',
            'picture' => 'mp9_wild_lily.webp',
            'price' => '2100.00',
            'rarity' => 'legendary',
        ],
    ];

    public function create(): View
    {
        return view('dashboard', ['skins' => $this->skins]);
    }

    public function retrieveSkins(Request $request): array
    {
        $request->validate([
            'searchQuery' => 'string|nullable',
            'sortBy' => 'string',
            'orderBy' => 'string',
        ]);
        $skins = $this->skins;
        $searchQuery = $request->input('searchQuery');
        if ($searchQuery) {
            $skins = array_filter($this->skins, function ($skin) use ($searchQuery) {
                return stripos($skin['name'], $searchQuery) !== false;
            });
        }

        $sortBy = $request->input('sortBy', 'name');
        $orderBy = $request->input('orderBy', 'none');
        usort($skins, function ($a, $b) use ($sortBy, $orderBy) {
            if ($sortBy === 'name') {
                $valueA = $a['name'];
                $valueB = $b['name'];
            } elseif ($sortBy === 'price') {
                $valueA = (float) $a['price'];
                $valueB = (float) $b['price'];
            } elseif ($sortBy === 'rarity') {
                $rarityOrder = [
                    'common' => 0,
                    'uncommon' => 1,
                    'rare' => 2,
                    'mythical' => 3,
                    'legendary' => 4,
                    'ancient' => 6,
                    'exceedingly rare' => 7,
                    'immortal' => 8,
                ];
                $valueA = $rarityOrder[$a['rarity']];
                $valueB = $rarityOrder[$b['rarity']];
            } else {
                return 0;
            }

            if ($orderBy === 'asc') {
                return $valueA <=> $valueB;
            } elseif ($orderBy === 'desc') {
                return $valueB <=> $valueA;
            }
            return 0;
        });

        return $skins;
    }
}
