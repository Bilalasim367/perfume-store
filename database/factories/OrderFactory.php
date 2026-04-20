<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'user_id' => User::query()->inRandomOrder()->value('id') ?? User::factory(),
            'status' => fake()->randomElement([
                Order::STATUS_PENDING,
                Order::STATUS_PROCESSING,
                Order::STATUS_SHIPPED,
                Order::STATUS_DELIVERED,
            ]),
            'total' => fake()->randomFloat(2, 50, 500),
            'shipping_name' => fake()->name(),
            'shipping_email' => fake()->safeEmail(),
            'shipping_address' => fake()->address(),
            'shipping_city' => fake()->city(),
            'shipping_phone' => fake()->phoneNumber(),
            'notes' => fake()->optional()->sentence(),
        ];
    }

    public function pending(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => Order::STATUS_PENDING,
        ]);
    }

    public function cancelled(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => Order::STATUS_CANCELLED,
        ]);
    }
}
