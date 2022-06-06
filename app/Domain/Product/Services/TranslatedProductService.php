<?php

namespace App\Domain\Product\Services;

use App\Domain\Product\Repositories\TranslatedProductRepository;
use App\Domain\Customer\Entities\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class TranslatedProductService
{
    private $translated_product_repository;

    public function __construct(TranslatedProductRepository $translated_product_repository)
    {
        $this->translated_product_repository = $translated_product_repository;
    }

    public function getTranslation($id)
    {
        $translation = $this->translated_product_repository->getProductTranslation($id);
        $array = [];
        foreach ($translation as $key => $lang) {
            $array[$key]['lang']        = $lang->Language->code;
            $array[$key]['name']        = $lang->name;
            $array[$key]['description'] = $lang->description;
        }

        return $array;
    }

    public function addProductTranslation($request, $product_id)
    {
        return $this->translated_product_repository->createTranslatedProduct($request, $product_id);
    }
}
