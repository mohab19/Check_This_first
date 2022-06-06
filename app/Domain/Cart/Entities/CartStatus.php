<?php

namespace App\Domain\Cart\Entities;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CartStatus extends Pivot
{
    protected $table = 'cart_statuses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cart_id',
        'status_id',
    ];
}
