<?php

namespace App\Domain\Cart\Repositories;

use App\Repositories\Eloquent\BaseRepository;
use App\Domain\Cart\Entities\CartProducts;
use App\Domain\Cart\Entities\CartStatus;
use App\Domain\Cart\Entities\Status;
use Illuminate\Support\Collection;
use App\Domain\Cart\Entities\Cart;
use Illuminate\Support\Str;

class CartRepository extends BaseRepository
{
    /**
     * Repository constructor.
     *
     * @param Cart $model
     */
    public function __construct(Cart $model)
    {
       parent::__construct($model);
    }

    public function findOne($id)
    {
        $cart = $this->model->where('customer_id', $id)->latest()->first();
        if(sizeof($cart->Statuses) > 1)
            return [];

        return $cart;
    }

    public function createCart($id)
    {
        $code = Str::random(6);
        while(!$this->model->where('transaction_code', $code)) {
            $code = Str::random(6);
        }

        $cart = $this->model->create([
            'customer_id'      => $id,
            'transaction_code' => $code,
            'amount'           => 0,
            'total'            => 0
        ]);

        return $cart;
    }

    public function updateCart($array=[])
    {
        $cart = $this->model->where('id', $array['cart_id'])->first();
        $cart->amount += $array['total'];
        $cart->total  += $array['total'] + ($array['total'] * $array['vat_percentage']);
        $cart->save();

        return $cart;
    }
}
