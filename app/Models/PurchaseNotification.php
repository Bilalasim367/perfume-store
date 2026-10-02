<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['customer_name', 'city', 'product_name', 'product_image', 'purchased_at', 'is_displayed'])]
class PurchaseNotification extends Model
{
    protected function casts(): array
    {
        return [
            'purchased_at' => 'datetime',
            'is_displayed' => 'boolean',
        ];
    }

    public function scopeDisplayed($query)
    {
        return $query->where('is_displayed', false)->orderByDesc('purchased_at');
    }
}
