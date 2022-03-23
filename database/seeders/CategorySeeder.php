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
        $factory->create([
        'name' => 'Action',
        'code' => 'ACT',
        ]);
        $factory->create([
        'name' => 'Role Playing',
        'code' => 'RPG',
        ]);
        $factory->create([
        'name' => 'Strategy',
        'code' => 'STRA',
        ]);
        $factory->create([
        'name' => 'Puzzle',
        'code' => 'PUZL',
        ]);
    
    }
}
