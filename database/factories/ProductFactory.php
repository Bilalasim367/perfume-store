<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        static $names = [
            'Midnight Rose', 'Ocean Breeze', 'Cedar Wood', 'Vanilla Sky',
            'Citrus Blast', 'Amber Dreams', 'Fresh Linen', 'Wood Spice',
            'Sweet Vanilla', 'Leather Oud', 'Floral Bloom', 'Aqua Pure',
            ' Jasmine Mist', 'Sandlewood', 'Musk Rose', 'Green Tea',
            'Cocoa Vanilla', 'Spice Orange', 'Velvet Rose', 'Deep Amber',
        ];
        static $index = 0;

        $name = $names[$index % count($names)].($index > 0 ? ' '.(intdiv($index, count($names)) + 1) : '');
        $index++;

        return [
            'category_id' => Category::query()->inRandomOrder()->value('id') ?? Category::factory(),
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => fake()->paragraph(),
            'price' => fake()->randomFloat(2, 20, 200),
            'original_price' => null,
            'stock' => fake()->numberBetween(0, 100),
            'image' => null,
            'is_active' => true,
        ];
    }

    public function withDiscount(): static
    {
        return $this->state(fn (array $attributes) => [
            'original_price' => fake()->randomFloat(2, 50, 250),
        ]);
    }

    public function outOfStock(): static
    {
        return $this->state(fn (array $attributes) => [
            'stock' => 0,
        ]);
    }
}
