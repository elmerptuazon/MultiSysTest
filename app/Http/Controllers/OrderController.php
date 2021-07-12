<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Order\IOrderService;
use App\Services\Responses\IResponseService;
use App\Http\Requests\Order\OrderRequest;
use App\Enums\SuccessMessages;
use App\Models\Order;
use App\Http\Requests\Order\SearchOrderRequest;

class OrderController extends Controller
{

    private IOrderService $orderService;
    private IResponseService $responseService;
    
    public function __construct(IOrderService $orderService,
                                IResponseService $responseService)
    {
        $this->orderService = $orderService;
        $this->responseService = $responseService;
    }

    public function store(OrderRequest $request) {
        $data = $request->validated();
        $addOrder = $this->orderService->addOrder($data);

        return $this->responseService->createdResponse(null, SuccessMessages::order_added);
    }

    public function update(OrderRequest $request, Order $order_id) {
        $data = $request->validated();
        $updateRecord = $this->orderRepository->update($order_id, $data);

        return $this->responseService->successResponse(array($updateRecord), SuccessMessages::order_updated);
    }

    public function search(SearchOrderRequest $request) {
        $data = $request->validated();
        $result = $this->orderService->searchOrder($data);

        return $this->responseService->successResponse(array($result), SuccessMessages::success);
    }
}
