<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;


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
            [
                'name' => 'Action',
                'code' => 'ACT',
            ],
            [
                'name' => 'Adventure',
                'code' => 'ADV',
            ],
            [
                'name' => 'Roleplaying',
                'code' => 'RPL',
            ],
            [
                'name' => 'Strategy',
                'code' => 'STG',
            ],
            [
                'name' => 'Puzzle',
                'code' => 'PZL'
            ]
        ]);
    }
}
