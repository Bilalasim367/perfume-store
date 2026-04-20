<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['category_id', 'name', 'slug', 'description', 'price', 'original_price', 'stock', 'image', 'is_active', 'is_featured'])]
class Product extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'original_price' => 'decimal:2',
            'is_active' => 'boolean',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function cartItems(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class)->orderBy('position');
    }

    public function averageRating(): float
    {
        return $this->reviews()->avg('rating') ?? 0;
    }

    public function reviewCount(): int
    {
        return $this->reviews()->count();
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeInStock($query)
    {
        return $query->where('stock', '>', 0);
    }

    public function scopeFeatured($query)
    {
        return $query->active()->inStock()->orderByDesc('is_featured')->latest()->limit(8);
    }

    public function isFeatured(): bool
    {
        return $this->is_featured;
    }

    public function scopeByCategory($query, $categoryId)
    {
        return $query->where('category_id', (int) $categoryId);
    }

    public function scopeWithDiscount($query)
    {
        return $query->whereNotNull('original_price')
            ->whereColumn('original_price', '>', 'price');
    }

    public function isInStock(): bool
    {
        return $this->stock > 0;
    }

    public function hasDiscount(): bool
    {
        return $this->original_price && $this->original_price > $this->price;
    }

    public function discountPercentage(): int
    {
        if (! $this->hasDiscount()) {
            return 0;
        }

        return (int) round(($this->original_price - $this->price) / $this->original_price * 100);
    }
}
