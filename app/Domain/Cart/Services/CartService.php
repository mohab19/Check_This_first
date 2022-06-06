<?php

namespace App\Domain\Cart\Services;

use App\Domain\Cart\Repositories\CartProductRepository;
use App\Domain\Cart\Repositories\CartStatusRepository;
use App\Domain\Cart\Repositories\CartRepository;
use App\Domain\Product\Services\ProductService;
use Illuminate\Http\Request;

class CartService
{
    private $cart_repository;
    private $cart_status_repository;
    private $cart_product_repository;
    private $product_service;

    public function __construct(
        CartRepository        $cart_repository,
        CartStatusRepository  $cart_status_repository,
        CartProductRepository $cart_product_repository,
        ProductService        $product_service
    )
    {
        $this->cart_repository         = $cart_repository;
        $this->cart_status_repository  = $cart_status_repository;
        $this->cart_product_repository = $cart_product_repository;
        $this->product_service         = $product_service;
    }

    public function addProductToCart($request)
    {
        $customer = auth()->guard('customer-api')->user();
        $cart     = $this->cart_repository->findOne($customer->id);
        if(!$cart) {
            $cart = $this->cart_repository->createCart($customer->id);
            $cart = $this->cart_status_repository->createStatus($cart->id);
        }
        elseif(sizeof($cart->Statuses) > 1) {
            $cart = $this->cart_repository->createCart($customer->id);
            $cart = $this->cart_status_repository->createStatus($cart->id);
        }

        $product = $this->product_service->findOne($request['product_id']);

        $array = [
            'cart_id'    => $cart->id,
            'product_id' => $product->id,
            'quantity'   => $request['quantity'],
            'price'      => $product->price,
            'total'      => $request['quantity'] * $product->price
        ];

        $cart_product = $this->cart_product_repository->addProductToCart($array);

        $array['vat_percentage'] = $product->Store->vat_percentage;

        $cart = $this->cart_repository->updateCart($array);

        return $cart;
    }

    public function getCart()
    {
        $customer = auth()->guard('customer-api')->user();

        return $this->cart_repository->findOne($customer->id);
    }

}
