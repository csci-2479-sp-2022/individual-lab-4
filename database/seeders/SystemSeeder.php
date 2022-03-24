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
            ['name'=> 'Super Nintendo', 'code'=> 'SN'],
            ['name'=> 'Sega Genesis', 'code'=> 'SG'],
            ['name'=> 'PlayStation', 'code'=> 'PS']

        ]);
    }
}
