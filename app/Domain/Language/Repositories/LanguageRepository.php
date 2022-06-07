<?php

namespace App\Domain\Language\Repositories;

use App\Domain\Language\Entities\Language;
use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Support\Collection;


class LanguageRepository extends BaseRepository
{
    /**
     * Repository constructor.
     *
     * @param Merchant $model
     */
    public function __construct(Language $model)
    {
       parent::__construct($model);
    }

    public function getLanguage()
    {
        return $this->model->where('code', app()->getLocale())->get();
    }

}
