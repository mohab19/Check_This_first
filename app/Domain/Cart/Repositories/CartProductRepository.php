<?php

namespace App\Domain\Cart\Repositories;

use App\Repositories\Eloquent\BaseRepository;
use App\Domain\Cart\Entities\CartProducts;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class CartProductRepository extends BaseRepository
{
    /**
     * Repository constructor.
     *
     * @param CartProducts $model
     */
    public function __construct(CartProducts $model)
    {
       parent::__construct($model);
    }

    public function findAllProducts($id)
    {
        return $this->model->where('cart_id', $id)->get();
    }

    public function addProductToCart($array = [])
    {
        return $this->model->create([
            'cart_id'      => $array['cart_id'],
            'product_id'   => $array['product_id'],
            'quantity'     => $array['quantity'],
            'price'        => $array['price'],
            'total'        => $array['total']
        ]);
    }
}
