<?php

namespace App\Domain\Store\Repositories;

use App\Repositories\Eloquent\BaseRepository;
use App\Domain\Store\Entities\Store;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;


class StoreRepository extends BaseRepository
{
    /**
     * Repository constructor.
     *
     * @param Merchant $model
     */
    public function __construct(Store $model)
    {
       parent::__construct($model);
    }

    /**
     * @return Collection
     */
    public function createStore($request)
    {
        return $this->model->create([
            'merchant_id'    => $request['merchant_id'],
            'name'           => $request['name'],
            'type'           => $request['type' ],
            'country_id'     => $request['country_id']
        ]);
    }

    public function findOne($id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function findMany($id)
    {
        return $this->model->where('merchant_id', $id)->get();
    }
}
