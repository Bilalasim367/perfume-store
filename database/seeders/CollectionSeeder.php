<?php

namespace Database\Seeders;

use App\Models\Collection;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CollectionSeeder extends Seeder
{
    public function run(): void
    {
        $collections = [
            'Sensory Range' => ['description' => 'A curated collection of scents that awaken your senses.'],
            'Executive Range' => ['description' => 'Premium fragrances for the modern professional.'],
            'Gifting' => ['description' => 'Perfect gifts for every occasion.'],
            'New Arrival' => ['description' => 'Latest additions to our fragrance collection.'],
            'OUD' => ['description' => 'Traditional and exotic oud fragrances.'],
            'Clearance Sale' => ['description' => 'Exclusive deals on select fragrances.'],
            'Poetic Range' => ['description' => 'Inspired by the beauty of nature.'],
            'Ahl E Oud' => ['description' => 'Traditional Arabic oud collection.'],
        ];

        foreach ($collections as $name => $data) {
            $collection = Collection::create([
                'name' => $name,
                'slug' => Str::slug($name),
                'description' => $data['description'],
                'is_featured' => true,
                'is_active' => true,
            ]);

            $products = Product::inRandomOrder()->take(4)->get();
            $collection->products()->sync($products);
        }
    }
}
