<?php

namespace App\Http\Controllers\Auth;

use App\Domain\Merchant\Requests\MerchantRegisterRequest;
use App\Domain\Merchant\Requests\MerchantLoginRequest;
use App\Domain\Merchant\Auth\MerchantAuthService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MerchantAuthController extends Controller
{
    private $merchant_service;

    public function __construct(
        MerchantAuthService $merchant_service
    )
    {
        $this->merchant_service = $merchant_service;
    }

    /**
     * Register Merchant to the DB.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(MerchantRegisterRequest $request)
    {
        $merchant = $this->merchant_service->register($request->toArray());

        if($merchant) {
            $response = [
                'response_code'    => 200,
                'response_data'    => $merchant,
                'response_message' => 'Merchant Created Successfully !'
            ];

            return response()->json($response, 200);
        }
        else {
            $response = [
                'response_code'    => 422,
                'response_data'    => [],
                'response_message' => 'Merchant Creation Failed !'
            ];

            return response()->json($response, 422);
        }
    }

    /**
     * gives a merchant access token.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(MerchantLoginRequest $request)
    {
        $response = $this->merchant_service->generateAccessToken($request->toArray());

        if ($response == 'password') {
            $response = [
                'response_code'    => 422,
                'response_data'    => '',
                'response_message' => 'Wrong Password entered !'
            ];

            return response()->json($response, 422);
        }
        elseif ($response == 'not exist') {
            $response = [
                'response_code'    => 422,
                'response_data'    => '',
                'response_message' => 'This Merchant is not in our Database!'
            ];

            return response()->json($response, 422);
        }
        else {
            $response = [
                'response_code'    => 200,
                'response_data'    => $response,
                'response_message' => 'Login Successfully !'
            ];

            return response()->json($response, 200);
        }
    }

}
