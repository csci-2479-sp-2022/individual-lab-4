<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VideoGames;
use App\Models\System;
use App\Models\Categories;

class VideoGamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nes = System::where('code', 'NES')->first();

        $action = Categories::where('code', 'ACT')->first();
        $adventure = Categories::where('code', 'ADV')->first();
        $platformer = Categories::where('code', 'PLT')->first();
        $sports = Categories::where('code', 'SPRT')->first();

        $nes->videoGames()->createMany([
            [
                'title' => "Mike Tyson's Punch Out!!",
                'release_year' => '1987',
                'completed' => true,
            ],
            [
                'title' => "Contra",
                'release_year' => '1988',
                'completed' => true,
            ],
            [
                'title' => "Kirby's Adventure",
                'release_year' => '1993',
                'completed' => false,
            ],
        ]);

        $punchOut = VideoGames::where(
            'title', "Mike Tyson's Punch Out!!")->first();
        $punchOut ->categories()->attach([
            $sports->id,
        ]);

        $contra = VideoGames::where(
            'title', "Contra")->first();
        $contra ->categories()->attach([
            $action->id,
            $adventure->id,
        ]);

        $kirbysAdv = VideoGames::where(
            'title', "Kirby's Adventure")->first();
        $kirbysAdv ->categories()->attach([
            $platformer->id,
        ]);



    }
}
