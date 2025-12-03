<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Collectible;
use App\Models\Location;
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
        // Create a test user
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        // Create 10 locations (Nebraska cities)
        Location::factory(10)->create();

        // Create 10 categories
        Category::factory(10)->create();

        // Create 10 collectibles
        Collectible::factory(10)->create([
            'user_id' => $user->id,
        ]);
    }
}
