<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\System;
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
        //Systems
        $spt = System::where('code', 'SPT')->first();
        $sgs = System::where('code', 'SGS')->first();
        $pys = System::where('code', 'PYS')->first();
        $xbx = System::where('code', 'XBX')->first();

        //Categories
        $act = Category::where('code', 'ACT')->first();
        $adv = Category::where('code', 'ADV')->first();
        $rpl = Category::where('code', 'RPL')->first();
        $stg = Category::where('code', 'STG')->first();
        $plz = Category::where('code', 'PZL')->first();



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
        ]);



        $sgs->videoGames()->createMany([
            [
                'title' => 'Sonic the Hedgehog 2',
                'release_year' => '1992',
                'completed' => true,
            ],
            [
                'title' => 'Castlevania: Bloodlines',
                'release_year' => '1994',
                'completed' => false,
            ],
        ]);



        $pys->videoGames()->createMany([
            [
                'title' => 'Little Big Planet',
                'release_year' => '2008',
                'completed' => false,
            ],
            [
                'title' => 'Bloodborne',
                'release_year' => '2015',
                'completed' => true,
            ],

        ]);

        $xbx->videoGames()->createMany([
            [
                'title' => 'Dark Souls',
                'release_year' => '2011',
                'completed' => true,
            ],
            [
                'title' => 'Dark Souls III',
                'release_year' => '2016',
                'completed' => true,
            ],

        ]);


        $mario = VideoGame::where('title', 'Super Mario Bros')->first();
        $mario->categories()->attach([
            $act->id,
            $adv->id,
        ]);

        $zelda = VideoGame::where('title', 'The Legend of Zelda')->first();
        $zelda->categories()->attach([
            $act->id,
            $stg->id,
        ]);

        $sonic = VideoGame::where('title', 'Sonic the Hedgehog 2')->first();
        $sonic->categories()->attach([
            $act->id,
            $stg->id,
        ]);

        $castlevania = VideoGame::where('title', 'Castlevania: Bloodlines')->first();
        $castlevania->categories()->attach([
            $act->id,
            $adv->id,
        ]);


        $littlebig = VideoGame::where('title', 'Little Big Planet')->first();
        $littlebig->categories()->attach([
            $plz->id,
            $adv->id,
        ]);

        $bloodborne = VideoGame::where('title', 'Bloodborne')->first();
        $bloodborne->categories()->attach([
            $act->id,
            $adv->id,
        ]);

        $darksouls = VideoGame::where('title', 'Dark Souls')->first();
        $darksouls->categories()->attach([
            $act->id,
            $adv->id,
        ]);

        $darksouls3 = VideoGame::where('title', 'Dark Souls III')->first();
        $darksouls3->categories()->attach([
            $act->id,
            $adv->id,
        ]);
    }
}
