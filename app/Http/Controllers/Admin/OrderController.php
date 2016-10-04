<?php

namespace App\Http\Controllers\Admin;

use App\Src\Models\Buffet;
use App\Src\Models\BuffetPackage;
use App\Src\Models\GuestService;
use App\Src\Models\Hall;
use App\Src\Models\LightService;
use App\Src\Models\Message;
use App\Src\Models\Order;
use App\Src\Models\Photographer;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * @var Order
     */
    private $orderRepository;
    /**
     * @var Buffet
     */
    private $buffet;
    /**
     * @var Message
     */
    private $message;
    /**
     * @var GuestService
     */
    private $guestService;
    /**
     * @var LightService
     */
    private $lightService;
    /**
     * @var Photographer
     */
    private $photographer;
    /**
     * @var BuffetPackage
     */
    private $buffetPackage;
    /**
     * @var Hall
     */
    private $hall;

    /**
     * OrderController constructor.
     * @param Order $orderRepository
     * @param Hall $hall
     * @param BuffetPackage $buffetPackage
     * @param Message $message
     * @param GuestService $guestService
     * @param LightService $lightService
     * @param Photographer $photographer
     */
    public function __construct(Order $orderRepository,Hall $hall,BuffetPackage $buffetPackage, Message $message, GuestService $guestService, LightService $lightService,Photographer $photographer)
    {
        $this->orderRepository = $orderRepository;
        $this->message = $message;
        $this->guestService = $guestService;
        $this->lightService = $lightService;
        $this->photographer = $photographer;
        $this->buffetPackage = $buffetPackage;
        $this->hall = $hall;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = $this->orderRepository->all();
        return view('admin.module.order.index',compact('orders'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $order = $this->orderRepository->find($id);
        $statuses = ['pending'=>'pending','success'=>'success','failed'=>'failed'];
        return view('admin.module.order.view',compact('order','statuses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $order = $this->orderRepository->find($id);
        $serviceType = $request->service_type;
        $statuses = ['pending'=>'pending','success'=>'success','failed'=>'failed'];
        if($request->has('status') && in_array($request->status,$statuses)) {
            $order->status = $request->status;
        }
        switch ($serviceType) {
            case 'buffet_package':
                $service = $this->buffetPackage->find($order->{$serviceType.'_id'});
                if($service) {
                    $order->buffet_package_id = NULL;
                    $order->buffet_date = NULL;
                    $order->amount = $order->amount - $service->price;
                }
                break;
            default:
                $service = false;
                switch ($serviceType) {
                    case 'message' :
                        $service = $this->message->find($order->{$serviceType.'_id'});
                        break;
                    case 'hall' :
                        $service = $this->hall->find($order->{$serviceType.'_id'});
                        break;
                    case 'photographer' :
                        $service = $this->photographer->find($order->{$serviceType.'_id'});
                        break;
                    case 'guest_service' :
                        $service = $this->guestService->find($order->{$serviceType.'_id'});
                        break;
                    case 'light_service' :
                        $service = $this->lightService->find($order->{$serviceType.'_id'});
                        break;
                }
                if($service) {
                    $order->{$serviceType.'_id'} = NULL;
                    $order->{$serviceType.'_date'} = NULL;
                    $order->amount = $order->amount - $service->price;
                }
        }
        $order->save();
        return redirect()->back()->with('success','Saved');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $order = $this->orderRepository->find($id);
        if($order) {
            $order->delete();
        }
        return redirect()->action('Admin\OrderController@index')->with('success','Deleted');
    }
}
