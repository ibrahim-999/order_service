<?php

namespace App\Http\Controllers;

use App\Jobs\OrderCreated;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected Model $model;

    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    public function store(Request $request)
    {
        $order = $this->model->create($request->all());
        OrderCreated::dispatch($order->toArray());
        return response()->json([
            'data' => $order,
            'message' => 'item has been added successfully'
        ]);
    }
    public function index(Request $request)
    {
        $orders = $this->model->all();
        return response()->json([
            'data' => $orders,
        ]);
    }

    public function show(Order $order)
    {

        return response()->json([
            'data' => $order,
        ]);
    }

    public function delete(Order $order)
    {
        $order->delete();
        return response()->json([
            'message' => 'item has been added successfully'
        ]);
    }
}
