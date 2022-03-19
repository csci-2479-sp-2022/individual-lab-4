<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\System;

class VideoGameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //get system
        $nes = System::where('code', 'NES')->first();

        //get categories
        $platformer = Category::where('code', 'PLT')->first();
        $adventure = Category::where('code', 'ADV')->first();
        
        //create games
        $nes->videoGames()->createMany([
            [
                'title' => 'Super Mario Bros',
                'release_year' => '1985',
                'completed' => true,
            ],
            // could add additional games here

        ]);

        $nes->videoGames()->createMany([
            [
                'title' => 'Super Mario Bros',
                'release_year' => '1985',
                'completed' => true,
            ],
            // could add additional games here
        ]);
    }
}
