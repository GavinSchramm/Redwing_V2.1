<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Location;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CollectibleFactory extends Factory
{
    public function definition(): array
    {
        $names = [
            'Rare 1909 Lincoln Penny',
            'First Edition Spider-Man #1',
            'Signed Babe Ruth Baseball',
            'Vintage Rolex Submariner',
            'Action Comics #1 (Reprint)',
            'Limited Edition Funko Pop',
            'Sealed Pokemon Booster Box',
            'Original Beatles Vinyl Album',
            'Antique Victorian Vase',
            'Autographed Michael Jordan Jersey',
            'Rare Magic: The Gathering Card',
            'Vintage Star Wars Figure',
            'Limited Edition Print',
            'Historical Military Medal',
            'Ancient Roman Coin',
        ];

        return [
            'location_id' => Location::inRandomOrder()->first()?->id ?? Location::factory(),
            'category_id' => Category::inRandomOrder()->first()?->id ?? Category::factory(),
            'user_id' => User::inRandomOrder()->first()?->id,
            'name' => fake()->randomElement($names),
            'description' => fake()->optional(0.8)->paragraph(),
            'acquisition_date' => fake()->optional(0.7)->dateTimeBetween('-10 years', 'now'),
            'condition' => fake()->randomElement(['mint', 'excellent', 'good', 'fair', 'poor']),
            'notes' => fake()->optional(0.5)->text(200),
        ];
    }
}
