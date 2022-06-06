<?php

namespace App\Http\Controllers;

use App\Domain\Product\Requests\ProductRegisterRequest;
use App\Domain\Product\Services\ProductService;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    private $product_service;

    public function __construct(ProductService $product_service)
    {
        $this->product_service = $product_service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $products = $this->product_service->getAllProducts($id);

        if($products)
            return customeResponse($products, 'Operation Successful');
        else
            return customeResponse('', 'Operation Failed', 500);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRegisterRequest $request)
    {
        $product = $this->product_service->createProduct($request->toArray());

        if($product)
            return customeResponse($product, 'Operation Successful');
        else
            return customeResponse('', 'Operation Failed', 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->product_service->getProduct($id);

        if($product)
            return customeResponse($product, 'Operation Successful');
        else
            return customeResponse('', 'Operation Failed', 500);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
