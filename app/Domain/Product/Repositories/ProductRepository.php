<?php

namespace App\Domain\Product\Repositories;

use App\Repositories\Eloquent\BaseRepository;
use App\Domain\Product\Entities\Product;
use Illuminate\Support\Collection;


class ProductRepository extends BaseRepository
{
    /**
     * Repository constructor.
     *
     * @param Merchant $model
     */
    public function __construct(Product $model)
    {
       parent::__construct($model);
    }

    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * @return Collection
     */
    public function createProduct($request)
    {
        return $this->model->create([
            'store_id'       => $request['store_id'],
            'name'           => $request['name'],
            'description'    => $request['description'],
            'price'          => $request['price']
        ]);
    }

    public function findOne($id)
    {
        return $this->model->find($id);
    }
}
