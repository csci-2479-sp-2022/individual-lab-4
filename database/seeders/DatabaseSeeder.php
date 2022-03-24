<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            SystemSeeder::class,
            CategorySeeder::class,
            VideoGameSeeder::class,
        ]);
    }
}
