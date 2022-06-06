<?php

namespace App\Domain\Customer\Services;

use App\Domain\Customer\Repositories\CustomerRepository;
use App\Domain\Customer\Entities\Customer;
use Illuminate\Http\Request;

class CustomerService
{
    private $customer_repository;

    public function __construct(CustomerRepository $customer_repository)
    {
        $this->customer_repository = $customer_repository;
    }
}
