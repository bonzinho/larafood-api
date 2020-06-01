<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreOrder;
use App\Http\Requests\Api\TenantFormRequest;
use App\Http\Resources\OrderResource;
use App\services\OrderService;

class OrderApiController extends Controller
{
    /**
     * @var OrderService
     */
    protected $orderService;


    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function store(StoreOrder $request){
        $order = $this->orderService->createNewOrder($request->all());
        return new OrderResource($order);
    }

    public function show($identify){
        if(!$order = $this->orderService->getOrderByIdentify($identify)){
            return response()->json(['message' => 'Pedido não encontrado'], 404);
        }

        return new OrderResource($order);
    }

    public function myOrders(){
        $orders = $this->orderService->orderByclient();

        return OrderResource::collection($orders);
    }
}
