<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userRole = Role::where('name', 'user')->first();
        $adminRole = Role::where('name', 'admin')->first();

        $readGames = Permission::create([
            'name' => 'read_game',
            'description' => 'can read games',
        ]);

        $writeGames = Permission::create([
            'name' => 'write_game',
            'description' => 'can create, edit, and delete games',
        ]);

        $userRole->permissions()->attach($readGames->id);
        $adminRole->permissions()->attach([
            $readGames->id,
            $writeGames->id,
        ]);
    }
}
