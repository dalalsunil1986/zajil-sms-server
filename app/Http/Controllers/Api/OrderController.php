<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Src\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

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

        $validator = Validator::make($request->json()->all(), [
            'name' => 'required',
            'amount' => 'required',
            'email' => 'required|email',
            'phone' => 'required|integer'
        ]);

        if($validator->fails()) {
            return response()->json(['success'=>false,'message'=>$validator->errors()->first()]);
        }

        $this->order->create([
            'secret_token' => $params->secret_token,
            'name' => $params->name,
            'email' => $params->email,
            'phone' => $params->phone,
            'amount'=>$params->amount,
            'message_id' => $params->message_id,
            'hall_id' => $params->hall_id,
            'buffet_package_id' => $params->buffet_package_id,
            'light_service_id' => $params->light_service_id,
            'guest_service_id' => $params->guest_service_id,
            'photographer_id' => $params->photographer_id,
            'message_date'=>$params->message_date,
            'buffet_date'=>$params->buffet_date,
            'hall_date'=>$params->hall_date,
            'photographer_date'=>$params->photographer_date,
            'light_service_date'=>$params->light_service_date,
            'guest_service_date'=>$params->guest_service_date,
        ]);

        $order = $this->order->where('secret_token',$params->secret_token)->first();


        if(!$order) {
            return response()->json(['success'=>false,'message'=>'Unknown Error Occured, Try again']);
        }


        return response()->json(['success'=>true,'data'=>$order]);

    }

}
