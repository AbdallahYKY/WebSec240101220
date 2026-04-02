<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // create admin and sample members
        $adminRole = \App\Models\Role::where('name', 'Admin')->first();
        $memberRole = \App\Models\Role::where('name', 'Member')->first();

        if ($adminRole) {
            User::factory()->create([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'role_id' => $adminRole->id,
                'password' => bcrypt('password'),
            ]);
        }

        if ($memberRole) {
            User::factory()->create([
                'name' => 'Member User',
                'email' => 'member@example.com',
                'role_id' => $memberRole->id,
                'password' => bcrypt('password'),
            ]);
        }
    }
}
