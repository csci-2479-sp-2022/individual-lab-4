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
        $factory->createMany([[
            'name' => 'Super Nintendo',
            'code' => 'NES',
        ],
        [
            'name' => 'Xbox',
            'code' => 'XBX',
        ],
        [
            'name' => 'Play Station 2',
            'code' => 'PS2',
        ]
        ]);
        //wombat need more systems
    }
}
