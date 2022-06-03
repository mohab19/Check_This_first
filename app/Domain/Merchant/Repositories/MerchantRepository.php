<?php

namespace App\Domain\Merchant\Repositories;

use App\Repositories\Eloquent\BaseRepository;
use App\Domain\Merchant\Entities\Merchant;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;


class MerchantRepository extends BaseRepository
{
    /**
     * Repository constructor.
     *
     * @param Merchant $model
     */
    public function __construct(Merchant $model)
    {
       parent::__construct($model);
    }

    /**
     * @return Collection
     */
    public function createMerchant($request)
    {
        return $this->model->create([
            'name'           => $request['name'],
            'email'          => $request['email'],
            'address'        => $request['address'],
            'password'       => Hash::make($request['password']),
            'remember_token' => Str::random(10)
        ]);
    }

    public function findOneByEmail($email)
    {
        return $this->model->where('email', $email)->first();
    }
}
