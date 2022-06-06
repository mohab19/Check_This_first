<?php

namespace App\Http\Controllers\Auth;

use App\Domain\Customer\Requests\CustomerRegisterRequest;
use App\Domain\Customer\Requests\CustomerLoginRequest;
use App\Domain\Customer\Auth\CustomerAuthService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerAuthController extends Controller
{
    private $customer_service;

    public function __construct(
        CustomerAuthService $customer_service
    )
    {
        $this->customer_service = $customer_service;
    }

    /**
     * Register Customer to the DB.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(CustomerRegisterRequest $request)
    {
        $customer = $this->customer_service->register($request->toArray());

        if($customer) {
            $response = [
                'response_code'    => 200,
                'response_data'    => $customer,
                'response_message' => 'Customer Created Successfully !'
            ];

            return response()->json($response, 200);
        }
        else {
            $response = [
                'response_code'    => 422,
                'response_data'    => [],
                'response_message' => 'Customer Creation Failed !'
            ];

            return response()->json($response, 422);
        }
    }

    /**
     * gives a customer access token.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(CustomerLoginRequest $request)
    {
        $response = $this->customer_service->generateAccessToken($request->toArray());

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
                'response_message' => 'This Customer is not in our Database!'
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
