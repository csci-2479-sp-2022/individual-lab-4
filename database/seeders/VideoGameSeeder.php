<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\System;
use App\Models\VideoGame;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideoGameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nes = System::where('code', 'PS')->first();
        $platformer = Category::where('code', 'PLT')->first();
        $adventure = Category::where('code', 'ADV')->first();


        $nes->videoGames()->createMany([
            [
                'title' => 'Super Mario Bros',
                'release_year' => '1985',
                'completed' => false,
            ],
            [
                'title' => 'Metroid',
                'release_year' => '1986',
                'completed' => false,
            ],
            [
                'title' => 'The legend of Zelda',
                'release_year' => '1986',
                'completed' => false,
            ],
        ]);

        $mario = VideoGame::where('title', 'Super Mario Bros')->first();
        $mario->categories()->attach([
            $platformer->id,
            $adventure->id,
        ]);
    }
}
