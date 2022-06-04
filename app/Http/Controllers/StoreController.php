<?php

namespace App\Http\Controllers;

use App\Domain\Store\Requests\StoreRegisterRequest;
use App\Domain\Store\Services\StoreService;
use App\Domain\Store\Entities\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    private $store_service;

    public function __construct(StoreService $store_service)
    {
        $this->store_service = $store_service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(StoreRegisterRequest $request)
    {
        $store = $this->store_service->createStore($request->toArray());

        if($store)
            return customeResponse($store, 'Operation Successful');
        else
            return customeResponse('', 'Operation Failed', 500);
    }

    /**
     * Display all merchant's stores.
     *
     * @param  int  $merchant_id
     * @return json
     */
    public function stores($merchant_id)
    {
        $stores = $this->store_service->getMerchantStores($merchant_id);

        if($stores)
            return customeResponse($stores, 'Operation Successful', 200);
        else
            return customeResponse('', 'Operation Failed', 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $store = $this->store_service->getStore($id);

        if($store)
            return customeResponse($store, 'Operation Successful', 200);

        return customeResponse('', 'Operation Failed', 500);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        //
    }
}
