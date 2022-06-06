<?php

namespace App\Domain\Product\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Domain\Language\Entities\Language;
use Illuminate\Database\Eloquent\Model;

class TranslatedProduct extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_id',
        'language_id',
        'name',
        'description'
    ];

    /**
     * Get the Product of this translation.
     */
    public function Product()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Get the Language of this translation.
     */
    public function Language()
    {
        return $this->belongsTo(Language::class);
    }
}
