<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Src\Models\BlockedDate;
use App\Src\Models\BuffetPackage;
use App\Src\Models\GuestService;
use App\Src\Models\Hall;
use App\Src\Models\LightService;
use App\Src\Models\Message;
use App\Src\Models\Order;
use App\Src\Models\Photographer;
use App\Src\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * @var Order
     */
    private $order;
    /**
     * @var Message
     */
    private $message;
    /**
     * @var BuffetPackage
     */
    private $buffetPackage;
    /**
     * @var Hall
     */
    private $hall;
    /**
     * @var Photographer
     */
    private $photographer;
    /**
     * @var GuestService
     */
    private $guestService;
    /**
     * @var LightService
     */
    private $lightService;
    /**
     * @var BlockedDate
     */
    private $blockedDate;

    /**
     * @param Order $order
     * @param Message $message
     * @param BuffetPackage $buffetPackage
     * @param Hall $hall
     * @param Photographer $photographer
     * @param GuestService $guestService
     * @param LightService $lightService
     * @param BlockedDate $blockedDate
     */
    public function __construct(Order $order,Message $message, BuffetPackage $buffetPackage, Hall $hall, Photographer $photographer, GuestService $guestService, LightService $lightService, BlockedDate $blockedDate)
    {
        $this->order = $order;
        $this->message = $message;
        $this->buffetPackage = $buffetPackage;
        $this->hall = $hall;
        $this->photographer = $photographer;
        $this->guestService = $guestService;
        $this->lightService = $lightService;
        $this->blockedDate = $blockedDate;
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
            'email' => 'email',
            'phone' => 'required|integer',
            'address' => 'required'
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
            'status' => 'pending'
        ]);

        $order = $this->order->where('secret_token',$params->secret_token)->first();

        if(!$order) {
            return response()->json(['success'=>false,'message'=>'Unknown Error Occured, Try again']);
        }

        $order->status = 'pending';
        $order->save();
        $this->blockDates($order);

        return response()->json(['success'=>true,'data'=>$order]);

    }

    public function editOrder(Request $request)
    {
        $id  = $request->json('id');
        $serviceColumn = $request->json('service_column');
        $order = $this->order->find($id);

        switch ($serviceColumn) {
            case 'buffet_package':
                $service = $this->buffetPackage->find($order->{$serviceColumn.'_id'});
                if($service) {
                    $order->buffet_package_id = NULL;
                    $order->buffet_date = NULL;
                    $order->amount = $order->amount - $service->price;
                }
                break;
            default:
                $service = false;
                switch ($serviceColumn) {
                    case 'message' :
                        $service = $this->message->find($order->{$serviceColumn.'_id'});
                        break;
                    case 'hall' :
                        $service = $this->hall->find($order->{$serviceColumn.'_id'});
                        break;
                    case 'photographer' :
                        $service = $this->photographer->find($order->{$serviceColumn.'_id'});
                        break;
                    case 'guest_service' :
                        $service = $this->guestService->find($order->{$serviceColumn.'_id'});
                        break;
                    case 'light_service' :
                        $service = $this->lightService->find($order->{$serviceColumn.'_id'});
                        break;
                }
                if($service) {
                    $order->{$serviceColumn.'_id'} = NULL;
                    $order->{$serviceColumn.'_date'} = NULL;
                    $order->amount = $order->amount - $service->price;
                }
        }
        $order->save();
        return response()->json(['success'=>true,'data'=>$order]);

    }

    public function blockDates($order)
    {
        $blockedDates= collect();
        $userID = 1;
        if ($order->buffet_package_id) {
            $blockedDates->push(['service_id' => $order->buffet_package_id, 'service_type' => 'buffetPackages', 'date' => $order->buffet_date, 'user_id' => $userID]);
        }

        if ($order->hall_id) {
            $blockedDates->push(['service_id' => $order->hall_id, 'service_type' => 'halls', 'date' => $order->hall_date, 'user_id' => $userID]);
        }

        if ($order->photographer_id) {
            $blockedDates->push(['service_id' => $order->photographer_id, 'service_type' => 'photographers', 'date' => $order->photographer_date, 'user_id' => $userID]);
        }

        if ($order->light_service_id) {
            $blockedDates->push(['service_id' => $order->light_service_id, 'service_type' => 'lightServices', 'date' => $order->light_service_date, 'user_id' => $userID]);
        }

        if ($order->guest_service_id) {
            $blockedDates->push(['service_id' => $order->guest_service_id, 'service_type' => 'guestServices', 'date' => $order->guest_service_date, 'user_id' => $userID]);
        }

        return $this->blockedDate->insert($blockedDates->toArray());
    }


}
