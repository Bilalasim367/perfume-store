<?php

namespace Database\Seeders;

use App\Models\Ad;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'is_admin' => true,
        ]);

        $customer = User::factory()->create([
            'name' => 'Test Customer',
            'email' => 'test@example.com',
            'is_admin' => false,
        ]);

        $categories = Category::factory(10)->create();

        Product::factory(30)->create();
        Product::factory(5)->withDiscount()->create();
        Product::factory(3)->outOfStock()->create();

        Ad::factory(5)->create();
    }
}
