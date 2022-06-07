<?php

namespace App\Domain\Cart\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Domain\Customer\Entities\Customer;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customer_id',
        'transaction_code',
        'amount',
        'total',
    ];

    /**
     * The statuses that belong to the cart.
     */
    public function Statuses()
    {
        return $this->belongsToMany(Status::class, 'cart_statuses');
    }

    /**
     * The products that is owned by the cart.
     */
    public function Products()
    {
        return $this->hasMany(CartProducts::class);
    }

    /**
     * The Customer that is owns the cart.
     */
    public function Customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
