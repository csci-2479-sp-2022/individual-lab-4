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
        $factory->create([
        'name' => 'Nintendo 64',
        'code' => 'N64',
        ]);
        $factory->create([
        'name' => 'Sega Genesis',
        'code' => 'SGEN',
        ]);
        $factory->create([
        'name' => 'Super Nintendo',
        'code' => 'SNES',
        ]);
        $factory->create([
        'name' => 'Game Boy',
        'code' => 'GBOY',
        ]);
    }
}
