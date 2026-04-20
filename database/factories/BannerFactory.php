<?php

namespace Database\Factories;

use App\Models\Banner;
use Illuminate\Database\Eloquent\Factories\Factory;

class BannerFactory extends Factory
{
    protected $model = Banner::class;

    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'image' => 'banners/'.fake()->uuid().'.jpg',
            'link' => fake()->randomElement([null, '/products']),
            'position' => fake()->numberBetween(0, 10),
            'is_active' => true,
        ];
    }
}
