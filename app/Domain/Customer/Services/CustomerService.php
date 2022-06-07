<?php

namespace App\Domain\Customer\Services;

use App\Domain\Customer\Events\OrderPlacedNotificationEvent;
use App\Domain\Customer\Repositories\CustomerRepository;
use App\Domain\Cart\Repositories\CartStatusRepository;
use App\Domain\Cart\Repositories\CartRepository;
use App\Domain\Customer\Entities\Customer;
use Illuminate\Http\Request;

class CustomerService
{
    private $cart_status_repository;
    private $customer_repository;
    private $cart_repository;

    public function __construct(
        CartStatusRepository $cart_status_repository,
        CustomerRepository   $customer_repository,
        CartRepository       $cart_repository
    )
    {
        $this->cart_status_repository = $cart_status_repository;
        $this->customer_repository    = $customer_repository;
        $this->cart_repository        = $cart_repository;
    }

    public function placeOrder($id)
    {
        $status = $this->cart_status_repository->UpdateStatus($id, 'Placed');
        $cart   = [];
        if($status) {
            $cart = $this->cart_repository->getCart($id);
            OrderPlacedNotificationEvent::dispatch($cart);
        }

        return $cart;
    }
}
