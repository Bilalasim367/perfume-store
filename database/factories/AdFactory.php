<?php

namespace Database\Factories;

use App\Models\Ad;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdFactory extends Factory
{
    protected $model = Ad::class;

    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'image' => 'ads/'.fake()->uuid().'.jpg',
            'link' => fake()->randomElement([null, '/products']),
            'placement' => fake()->randomElement(Ad::PLACEMENTS),
            'position' => fake()->numberBetween(0, 10),
            'is_active' => true,
            'starts_at' => null,
            'ends_at' => null,
        ];
    }
}
