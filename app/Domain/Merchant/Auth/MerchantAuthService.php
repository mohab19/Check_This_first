<?php

namespace App\Domain\Merchant\Auth;

use App\Domain\Merchant\Repositories\MerchantRepository;
use App\Domain\Customer\Entities\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class MerchantAuthService
{
    private $merchant_repository;

    public function __construct(MerchantRepository $merchant_repository)
    {
        $this->merchant_repository = $merchant_repository;
    }

    public function register($request)
    {
        return $this->merchant_repository->createMerchant($request);
    }

    public function generateAccessToken($request)
    {
        $merchant = $this->merchant_repository->findOneByEmail($request['email']);
        if ($merchant)
        {
            if (Hash::check($request['password'], $merchant->password)) {
                return $merchant->createToken('MerchantToken')->accessToken;
            } else {
                return 'password';
            }
        } else {
            return 'not exist';
        }
    }
}
