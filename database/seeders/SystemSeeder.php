<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\System;

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
            [
                'name' => 'Nintendo Entertainment System',
                'code' => 'NES'
            ],
            [
                'name' => 'Super Nintendo',
                'code' => 'SNES'
            ],
            [
                'name' => 'Sega Genesis',
                'code' => 'SG'
            ],
            [
                'name' => 'Playstation',
                'code' => 'PS'
            ]
        ]);
    }
}
