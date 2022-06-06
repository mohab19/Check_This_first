<?php

namespace App\Domain\Product\Repositories;

use App\Domain\Product\Entities\TranslatedProduct;
use App\Domain\Language\Entities\Language;
use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Support\Collection;


class TranslatedProductRepository extends BaseRepository
{
    /**
     * Repository constructor.
     *
     * @param Merchant $model
     */
    public function __construct(TranslatedProduct $model)
    {
       parent::__construct($model);
    }

    public function getProductTranslation($id)
    {
        return $this->model->where('product_id', $id)->get();
    }

    /**
     * @return Collection
     */
    public function createTranslatedProduct($request, $id)
    {
        foreach ($request as $key => $trans) {
            $lang = Language::where('code', $trans['lang'])->first();
            return $this->model->create([
                'product_id'     => $id,
                'language_id'    => $lang->id,
                'name'           => $trans['name'],
                'description'    => $trans['description']
            ]);
        }

    }
    
}
