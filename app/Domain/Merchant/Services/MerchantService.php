<?php

namespace App\Domain\Merchant\Services;

use App\Domain\Merchant\Repositories\MerchantRepository;
use App\Domain\Customer\Entities\Customer;
use Illuminate\Http\Request;

class MerchantService
{
    private $merchant_repository;

    public function __construct(MerchantRepository $merchant_repository)
    {
        $this->merchant_repository = $merchant_repository;
    }
}
