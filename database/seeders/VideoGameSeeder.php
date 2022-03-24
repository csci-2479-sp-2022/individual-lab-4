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
        $nes = System::where('code', 'NES')->first();
        
        $platformer = Category::where('code', 'PLT')->first();
        $adventure = Category::where('code', 'ADV')->first();

        $nes->videoGames()->createMany([
            [
                'title' => 'Super Mario Bros',
                'release_year' => '1985',
                'completed' => true,
            ],
            // could add additional games here
        ]);

        $mario = VideoGame::where('title', 'Super Mario Bros')->first();
        $mario->categories()->attach([
        $platformer->id,
        $adventure->id,
        ]);
    }
}
