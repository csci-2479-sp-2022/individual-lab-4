<?php

namespace Database\Seeders;
use App\Models\VideoGame;
use App\Models\System;
use App\Models\Category;
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
        $factory = VideoGame::factory();
        $snes = System::where('code', 'SNES')->first();
        $n64 = System::where('code', 'N64')->first();
        $action = Category::where('code', 'ACT')->first();
        $puzzle = Category::where('code', 'PUZL')->first();

        $snes->videoGames()->createMany([
            [
                'title' => 'Super Mario World',
                'release_year' => '1991',
                'completed' => false,
            ],

            [
                'title' => 'Tetris',
                'release_year' => '1997',
                'completed' => false,
            ],
        ]);


        $n64->videoGames()->createMany([
            [
                'title' => 'GoldenEye',
                'release_year' => '1997',
                'completed' => false,
            ],
        ]);

        $mario = VideoGame::where('title', 'Super Mario World')->first();
        $mario->categories()->attach([
            $action->id,
        ]);

        $goldenEye = VideoGame::where('title', 'GoldenEye')->first();
        $goldenEye->categories()->attach([
            $action->id,
        ]);

        $tetris = VideoGame::where('title', 'Tetris')->first();
        $tetris->categories()->attach([
            $puzzle->id,
        ]);
      
    }
}
