<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use YiddisheKop\LaravelCommerce\Contracts\Purchasable;
use YiddisheKop\LaravelCommerce\Traits\Purchasable as PurchasableTrait;

class Product extends Model implements Purchasable
{
    use HasFactory, PurchasableTrait;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'price',
        'quantity',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPrice($currency = null, $options = null): int|float
    {
        return $this->price;
    }
}
