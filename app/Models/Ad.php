<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'image', 'link', 'placement', 'position', 'is_active', 'starts_at', 'ends_at'])]
class Ad extends Model
{
    use HasFactory;

    public const PLACEMENT_HOME = 'home';

    public const PLACEMENT_PRODUCT = 'product';

    public const PLACEMENT_CART = 'cart';

    public const PLACEMENT_CHECKOUT = 'checkout';

    public const PLACEMENTS = [
        self::PLACEMENT_HOME,
        self::PLACEMENT_PRODUCT,
        self::PLACEMENT_CART,
        self::PLACEMENT_CHECKOUT,
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'position' => 'integer',
            'starts_at' => 'datetime',
            'ends_at' => 'datetime',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)
            ->where(fn ($q) => $q
                ->whereNull('starts_at')
                ->orWhere('starts_at', '<=', now()))
            ->where(fn ($q) => $q
                ->whereNull('ends_at')
                ->orWhere('ends_at', '>=', now()));
    }

    public function scopeFeatured($query)
    {
        return $query->active()->orderBy('position');
    }

    public function scopeByPlacement($query, string $placement)
    {
        return $query->where('placement', $placement);
    }

    public function isActive(): bool
    {
        if (! $this->is_active) {
            return false;
        }

        if ($this->starts_at && $this->starts_at > now()) {
            return false;
        }

        if ($this->ends_at && $this->ends_at < now()) {
            return false;
        }

        return true;
    }
}
