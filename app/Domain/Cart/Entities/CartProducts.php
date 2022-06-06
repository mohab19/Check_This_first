<?php

namespace App\Domain\Cart\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartProducts extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity',
        'price',
        'total',
    ];

    /**
     * The products that is owned by the cart.
     */
    public function Cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
