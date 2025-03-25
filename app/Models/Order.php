<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function products() {
        return $this->belongsToMany(Product::class, 'order_items')->withPivot('quantity', 'price');
    }

    public function payments() {
        return $this->hasOne(Payment::class);
    }

}
