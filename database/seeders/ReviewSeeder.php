<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();
        $users = User::where('is_admin', false)->get();

        if ($users->isEmpty()) {
            return;
        }

        $comments = [
            'Amazing scent! Very long lasting.',
            'Great value for money. Love it!',
            'Highly recommended!',
            'Fresh and elegant fragrance.',
            'Perfect for daily use.',
            'Great quality product.',
            'My favorite perfume now!',
            'Worth every penny.',
            'Beautiful packaging too.',
            'Gets me compliments all the time.',
        ];

        foreach ($products as $product) {
            $numReviews = rand(1, 3);

            for ($i = 0; $i < $numReviews; $i++) {
                Review::create([
                    'user_id' => $users->random()->id,
                    'product_id' => $product->id,
                    'rating' => rand(3, 5),
                    'comment' => $comments[array_rand($comments)],
                ]);
            }
        }
    }
}
