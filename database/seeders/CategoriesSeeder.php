<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categories;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $factory = Categories::factory();
        $factory->createMany([
            ['name' => 'Action','code' => 'ACT',],
            ['name' => 'Adventure','code' => 'ADV',],
            ['name' => 'Platformer','code' => 'PLT',],
            ['name' => 'Puzzle','code' => 'PUZ',],
            ['name' => 'Role_Playing','code' => 'RPG',],
            ['name' => 'Strategy','code' => 'STR',],
            ['name' => 'Sports','code' => 'SPRT',],

/*            'name' => 'Action',
            'code' => 'ACT'
        ],[
            'name' => 'Adventure',
            'code' => 'ADV'
        ],[
            'name' => 'Platformer',
            'code' => 'PLT'
        ],[
            'name' => 'Puzzle',
            'code' => 'PUZ'
        ],[
            'name' => 'Role-Playing',
            'code' => 'RPG'
        ],[
            'name' => 'Strategy',
            'code' => 'STR'
        ],[
            'name' => 'Sports',
            'code' => 'SPRT'
*/
        ]);
    }
}
