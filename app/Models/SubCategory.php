<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $table = 'subcategories';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'category_id'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function product() {
        return $this->hasMany(Product::class);
    }
}
