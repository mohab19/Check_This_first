<?php

namespace App\Domain\Store\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Domain\Merchant\Entities\Merchant;
use App\Domain\Product\Entities\Product;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'merchant_id',
        'name',
        'type',
        'country_id'
    ];

    /**
     * Get the Merchant that owns this store.
     */
    public function Merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    /**
     * Get the products owned by a store.
     */
    public function Products()
    {
        return $this->hasMany(Product::class);
    }
}
