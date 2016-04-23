<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Src\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @var Order
     */
    private $order;

    /**
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function index()
    {
        $orders = $this->order->all();
        return response()->json(['data' => $orders]);
    }

}
