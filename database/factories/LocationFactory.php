<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LocationFactory extends Factory
{
    public function definition(): array
    {
        $cities = [
            ['town_name' => 'Omaha', 'latitude' => 41.2565, 'longitude' => -95.9345],
            ['town_name' => 'Lincoln', 'latitude' => 40.8136, 'longitude' => -96.7026],
            ['town_name' => 'Bellevue', 'latitude' => 41.1544, 'longitude' => -95.9145],
            ['town_name' => 'Grand Island', 'latitude' => 40.9264, 'longitude' => -98.3420],
            ['town_name' => 'Kearney', 'latitude' => 40.6993, 'longitude' => -99.0817],
            ['town_name' => 'Fremont', 'latitude' => 41.4333, 'longitude' => -96.4980],
            ['town_name' => 'Hastings', 'latitude' => 40.5861, 'longitude' => -98.3881],
            ['town_name' => 'Norfolk', 'latitude' => 42.0283, 'longitude' => -97.4170],
            ['town_name' => 'Columbus', 'latitude' => 41.4300, 'longitude' => -97.3678],
            ['town_name' => 'Papillion', 'latitude' => 41.1544, 'longitude' => -96.0422],
        ];

        $city = fake()->unique()->randomElement($cities);

        return [
            'town_name' => $city['town_name'],
            'state' => 'NE',
            'latitude' => $city['latitude'],
            'longitude' => $city['longitude'],
            'description' => fake()->optional(0.5)->sentence(),
        ];
    }
}
