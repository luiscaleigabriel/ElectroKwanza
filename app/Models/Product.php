<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'description',
        'price', 'stock', 'image1',
        'image2', 'image3', 'is_active',
        'brand_id', 'category_id', 'subcategory_id'
    ];

    public function categories() {
        return $this->belongsTo(Category::class);
    }

    public function subcategories() {
        return $this->belongsTo(SubCategory::class);
    }

    public function brands() {
        return $this->belongsTo(Brand::class);
    }

    public function orders() {
        return $this->belongsToMany(Order::class, 'order_items')->withPivot('quantity', 'price');
    }
}
