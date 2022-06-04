<?php

namespace App\Domain\Store\Services;

use App\Domain\Store\Repositories\StoreRepository;
use App\Domain\Customer\Entities\Customer;
use Illuminate\Http\Request;

class StoreService
{
    private $store_repository;

    public function __construct(StoreRepository $store_repository)
    {
        $this->store_repository = $store_repository;
    }

    public function createStore($request)
    {
        return $this->store_repository->createStore($request);
    }

    public function getStore($request)
    {
        return $this->store_repository->findOne($request);
    }

    public function getMerchantStores($id)
    {
        return $this->store_repository->findMany($id);
    }
}
