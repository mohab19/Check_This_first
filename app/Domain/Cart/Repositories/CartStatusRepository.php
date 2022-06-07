<?php

namespace App\Domain\Cart\Repositories;

use App\Repositories\Eloquent\BaseRepository;
use App\Domain\Cart\Entities\CartStatus;
use App\Domain\Cart\Entities\Status;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class CartStatusRepository extends BaseRepository
{
    /**
     * Repository constructor.
     *
     * @param Cart $model
     */
    public function __construct(CartStatus $model)
    {
       parent::__construct($model);
    }

    public function createStatus($id)
    {
        $status = $this->model->create([
            'cart_id'   => $id,
            'status_id' => Status::where('name', 'Created')->first()->id
        ]);

        return $status;
    }

    public function UpdateStatus($id, $status)
    {
        $status = $this->model->create([
            'cart_id'   => $id,
            'status_id' => Status::where('name', $status)->first()->id
        ]);

        return $status;
    }
}
