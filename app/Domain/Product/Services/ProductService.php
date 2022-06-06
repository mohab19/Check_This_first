<?php

namespace App\Domain\Product\Services;

use App\Domain\Product\Services\TranslatedProductService;
use App\Domain\Product\Repositories\ProductRepository;
use App\Domain\Customer\Entities\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ProductService
{
    private $product_repository;
    private $translated_product_service;

    public function __construct(
        ProductRepository        $product_repository,
        TranslatedProductService $translated_product_service
    )
    {
        $this->product_repository         = $product_repository;
        $this->translated_product_service = $translated_product_service;
    }

    public function findOne($id)
    {
        return $this->product_repository->findOne($id);
    }

    public function getAllProducts()
    {
        $products = $this->product_repository->getAll();
        $array   = [];
        if($products) {
            foreach ($products as $key => $product) {
                $array[$key] = [
                    'id'          => $product->id,
                    'name'        => $product->name,
                    'description' => $product->description,
                    'price'       => $product->price,
                    'languages'   => [],
                ];

                $translation = $this->translated_product_service->getTranslation($product->id);
                if($translation) {
                    $array[$key]['languages'] = $translation;
                }
            }
        }

        return $array;
    }

    public function getProduct($id)
    {
        $product = $this->product_repository->findOne($id);
        $array   = [];
        if($product) {
            $array       = [
                'id'          => $product->id,
                'name'        => $product->name,
                'description' => $product->description,
                'price'       => $product->price,
                'languages'   => [],
            ];

            $translation = $this->translated_product_service->getTranslation($product->id);
            if($translation) {
                $array['languages'] = $translation;
            }
        }

        return $array;
    }

    public function createProduct($request)
    {
        $product     = $this->product_repository->createProduct(Arr::except($request, 'languages'));
        $translated  = Arr::only($request, 'languages');
        $translation = $this->translated_product_service->addProductTranslation($translated['languages'], $product->id);

        if($product && $translation)
            return true;

        return false;
    }
}
