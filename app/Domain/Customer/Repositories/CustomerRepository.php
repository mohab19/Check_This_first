<?php

namespace App\Domain\Customer\Repositories;

use App\Repositories\Eloquent\BaseRepository;
use App\Domain\Customer\Entities\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;


class CustomerRepository extends BaseRepository
{
    /**
     * Repository constructor.
     *
     * @param Customer $model
     */
    public function __construct(Customer $model)
    {
       parent::__construct($model);
    }

    /**
     * @return Collection
     */
    public function createCustomer($request)
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
