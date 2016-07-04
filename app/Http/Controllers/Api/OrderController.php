<?php

namespace App\Http\Controllers\Api;

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
        $orders = $this->order->with([
            'message','buffetPackage','guestService','lightService','hall','photographer'
        ])->latest()->get();
        return response()->json(['data' => $orders]);
    }

    public function store(Request $request)
    {
        $params = (object) $request->json()->all();
        $this->order->create([
            'secret_token' => $params->secret_token,
            'name' => $params->name,
            'email' => $params->email,
            'phone' => $params->phone,
            'message_id' => $params->message_id,
            'hall_id' => $params->hall_id,
            'buffet_package_id' => $params->buffet_package_id,
            'light_service_id' => $params->light_service_id,
            'guest_service_id' => $params->guest_service_id,
            'photographer_id' => $params->photographer_id,
            'message_date'=>$request->message_date,
            'buffet_date'=>$request->buffet_date,
            'hall_date'=>$request->hall_date,
            'photographer_date'=>$request->photographer_date,
            'light_service_date'=>$request->light_service_date,
            'guest_service_date'=>$request->guest_service_date,
            'amount'=>$request->amount
        ]);

        $order = $this->order->where('secret_token',$params->secret_token)->first();

        if(!$order) {
            return response()->json(['success'=>false,'message'=>'Could not save to database']);
        }
        
        return response()->json(['success'=>true,'data'=>$order]);

    }

}
