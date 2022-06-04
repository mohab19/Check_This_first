<?php

namespace App\Domain\Product\Services;

use App\Domain\Product\Repositories\ProductRepository;
use App\Domain\Customer\Entities\Customer;
use Illuminate\Http\Request;

class ProductService
{
    private $product_repository;

    public function __construct(ProductRepository $product_repository)
    {
        $this->product_repository = $product_repository;
    }

    public function getAllProducts()
    {
        return $this->product_repository->getAll();
    }
}
