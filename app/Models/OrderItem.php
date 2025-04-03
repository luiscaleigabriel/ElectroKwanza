<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price'
    ];

    /**
     * Get the order that owns the order item.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get the product associated with the order item.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Calculate the total price for this item (quantity × price)
     */
    public function getTotalAttribute()
    {
        return $this->quantity * $this->price;
    }

    /**
     * Format the price with currency
     */
    public function getFormattedPriceAttribute()
    {
        return number_format($this->price, 2, ',', '.') . ' Kz';
    }

    /**
     * Format the total with currency
     */
    public function getFormattedTotalAttribute()
    {
        return number_format($this->total, 2, ',', '.') . ' Kz';
    }
}
