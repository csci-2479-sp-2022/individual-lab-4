<?php

namespace Database\Seeders;

use App\Models\System;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $factory = System::factory();
        $factory->createMany([
            ['name' => 'Atari'       ,'code' => 'ATAR',],
            ['name' => 'Sega'        ,'code' => 'SEGA',],
            ['name' => 'Nintendo'    ,'code' => 'NES',],
            ['name' => 'Commodore 64','code' => 'C64',],
            ['name' => 'Playstation' ,'code' => 'PLST',],
            ['name' => 'Xbox'        ,'code' => 'XBOX',],
        ]);
    }
}
