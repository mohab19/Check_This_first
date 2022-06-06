<?php

namespace App\Domain\Cart\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The carts that belong to the statuses.
     */
    public function Carts()
    {
        return $this->belongsToMany(Status::class, 'cart_statuses');
    }
}
