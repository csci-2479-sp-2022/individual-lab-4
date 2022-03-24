<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;




class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $factory = Category::factory();
        $factory->createMany([
        ['name' => 'Action','code' => 'ACT'],
        ['name' => 'Adventure', 'code' => 'ADV'],
        ['name' => 'Roleplaying', 'code' => 'RPG'],
        ['name' => 'Strategy', 'code' => 'STR'],
        ['name' => 'Puzzle', 'code' => 'PUZ'],
        ['name' => 'Platformer', 'code' => 'PLT']
        ]);
    }
}
