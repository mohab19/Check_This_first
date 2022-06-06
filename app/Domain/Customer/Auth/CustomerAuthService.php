<?php

namespace App\Domain\Customer\Auth;

use App\Domain\Customer\Repositories\CustomerRepository;
use App\Domain\Customer\Entities\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class CustomerAuthService
{
    private $customer_repository;

    public function __construct(CustomerRepository $customer_repository)
    {
        $this->customer_repository = $customer_repository;
    }

    public function register($request)
    {
        return $this->customer_repository->createCustomer($request);
    }

    public function generateAccessToken($request)
    {
        $customer = $this->customer_repository->findOneByEmail($request['email']);
        if ($customer)
        {
            if (Hash::check($request['password'], $customer->password)) {
                return $customer->createToken('CustomerToken')->accessToken;
            } else {
                return 'password';
            }
        } else {
            return 'not exist';
        }
    }
}
