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
        //Systems
        $spt = System::where('code', 'SPT')->first();
        $sgs = System::where('code', 'SGS')->first();
        $pys = System::where('code', 'PYS')->first();
        $nes = System::where('code', 'NES')->first();

        //Categories
        $act = Category::where('code', 'ACT')->first();
        $adv = Category::where('code', 'ADV')->first();
        $rpl = Category::where('code', 'RPL')->first();
        $stg = Category::where('code', 'STG')->first();
        $plz = Category::where('code', 'PZL')->first();
        $platformer = Category::where('code', 'PLT')->first();
        $adventure = Category::where('code', 'ADV')->first();



        $spt->videoGames()->createMany([
            [
                'title' => 'Super Mario Bros',
                'release_year' => '1985',
                'completed' => true,
            ],
            [
                'title' => 'The Legend of Zelda',
                'release_year' => '1986',
                'completed' => true,
            ],
        ]);        // could add additional games here




        $sgs->videoGames()->createMany([
            [
                'title' => 'Castlevania: Bloodlines', //action adventure
                'release_year' => '1990',
                'completed' => false,
            ],
            [
                'title' => 'Mortal Kombat II', //action and adventure
                'release_year' => '1993',
                'completed' => true,
            ],
        ]);



        $pys->videoGames()->createMany([
            [
                'title' => 'God Of War', //act adv
                'release_year' => '2018',
                'completed' => true,
            ],
            [
                'title' => 'The Last of Us', //act adv
                'release_year' => '2013',
                'completed' => false,
            ],

        ]);

        $mario = VideoGame::where('title', 'Super Mario Bros')->first();
        $mario->categories()->attach([
            $act->id,
            $adv->id,
        ]);

        $mario = VideoGame::where('title', 'Super Mario Bros')->first();
        $mario->categories()->attach([
            $platformer->id,
            $adventure->id,
        ]);

        $zelda = VideoGame::where('title', 'The Legend of Zelda')->first();
        $zelda->categories()->attach([
            $act->id,
            $stg->id,
        ]);


        $castlevania = VideoGame::where('title', 'Castlevania: Bloodlines')->first();
        $castlevania->categories()->attach([
            $act->id,
            $adv->id,
        ]);

        $mortalKombat = VideoGame::where('title', 'Mortal Kombat II')->first();
        $mortalKombat->categories()->attach([
            $act->id,
            $stg->id,
        ]);


        $war = VideoGame::where('title', 'God Of War')->first();
        $war->categories()->attach([
            $act->id,
            $adv->id,
        ]);

    }
}
