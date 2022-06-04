<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Store\Entities\Store;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'store_id',
        'name',
        'description',
        'price',
        'vat_included',
        'vat_percentage'
    ];

    /**
     * Get the Store that owns this Product.
     */
    public function Store()
    {
        return $this->belongsTo(Store::class);
    }
}
