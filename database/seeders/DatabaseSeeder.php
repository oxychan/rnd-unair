<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            UserToRoleSeeder::class,
            MenuSeeder::class,
            PermissionSeeder::class,
            PermissionToRole::class,
            WeightSeeder::class,
            RequestTypeSeeder::class,
            RequestSeeder::class,
            RequestItemSeeder::class,
        ]);
    }
}
