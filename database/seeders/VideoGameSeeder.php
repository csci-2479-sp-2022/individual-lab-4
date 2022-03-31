<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\System;
use App\Models\Category;
use App\Models\VideoGame;

class VideoGameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $n64 = System::where('code', 'N64')->first();

        $action = Category::where('code', 'ACT')->first();
        $adventure = Category::where('code', 'ADV')->first();
        $sport = Category::where('code', 'SPRT')->first();

        $n64->videoGames()->createMany([
            [
                'title' => 'Pokemon Stadium',
                'release_year' => '1998',
                'completed' => true,
            ],
            [
                'title' => 'Super Mario 64',
                'release_year' => '1996',
                'completed' => true,
            ],
            [
                'title' => 'NBA Live 2000',
                'release_year' => '2000',
                'completed' => true,
            ]

        ]);

        $pokemon = VideoGame::where('title', 'Pokemon Stadium')->first();
        $pokemon->categories()->attach([
        $action->id,
        $adventure->id
        ]);

        $supermario = VideoGame::where('title', 'Super Mario 64')->first();
        $supermario->categories()->attach([
        $action->id,
        $adventure->id
        ]);

        $nbalive = VideoGame::where('title', 'NBA Live 2000')->first();
        $nbalive->categories()->attach([
        $sport->id,
        ]);
    }
}
