<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        $categories = [
            ['name' => 'Coins', 'color' => '#FFD700'],
            ['name' => 'Stamps', 'color' => '#FF6347'],
            ['name' => 'Action Figures', 'color' => '#4169E1'],
            ['name' => 'Trading Cards', 'color' => '#32CD32'],
            ['name' => 'Comic Books', 'color' => '#FF1493'],
            ['name' => 'Vinyl Records', 'color' => '#8B4513'],
            ['name' => 'Antiques', 'color' => '#DEB887'],
            ['name' => 'Sports Memorabilia', 'color' => '#FF8C00'],
            ['name' => 'Video Games', 'color' => '#9370DB'],
            ['name' => 'Art', 'color' => '#20B2AA'],
        ];

        $category = fake()->unique()->randomElement($categories);

        return [
            'name' => $category['name'],
            'description' => fake()->optional()->sentence(),
            'color' => $category['color'],
        ];
    }
}
