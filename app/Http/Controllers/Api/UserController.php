<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Src\Models\BuffetPackage;
use App\Src\Models\GuestService;
use App\Src\Models\Hall;
use App\Src\Models\LightService;
use App\Src\Models\Message;
use App\Src\Models\Order;
use App\Src\Models\Photographer;
use App\Src\Models\User\User;
use App\Src\Models\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @var User
     */
    private $userRepository;
    /**
     * @var UserService
     */
    private $userService;
    /**
     * @var Order
     */
    private $orderRepository;

    /**
     * UserController constructor.
     * @param User $userRepository
     * @param UserService $userService
     * @param Order $orderRepository
     */
    public function __construct(User $userRepository,UserService $userService,Order $orderRepository)
    {
        $this->userRepository = $userRepository;
        $this->userService = $userService;
        $this->orderRepository = $orderRepository;
    }

    public function getServices($userID)
    {
        $user = $this->userRepository->has('services.service')->with('services.service')->find($userID);

        $user->userServices = $user->services->groupBy('service_type')->map(function($serviceable) {
            return $serviceable->pluck('service');
        });
        unset($user->services);
        return response()->json(['data'=>$user,'success'=>true],200);
    }

    public function getAppointments($userID)
    {
        $user = $this->userRepository->with('services')->find($userID);
        $user->userOrders = $user->services->groupBy('service_type')->map(function($serviceable) use ($user) {
            foreach ($serviceable as $service) {
                $userServices = $user->services->where('service_type',$service->service_type);
                $servicesIDs = $userServices->pluck('service_id')->toArray();
                switch ($service->service_type) {
                    case 'messages':
                        $collection = $this->orderRepository->with('message')->whereIn('message_id',$servicesIDs)->get()->toArray();
                        return $collection;
                        break;
                    case 'halls':
                        $collection = $this->orderRepository->with('hall')->whereIn('hall_id',$servicesIDs)->get()->toArray();
                        return $collection;
                        break;
                    case 'photographers':
                        $collection = $this->orderRepository->with('photographer')->whereIn('photographer_id',$servicesIDs)->get()->toArray();
                        return $collection;
                        break;
                    case 'guestServices':
                        $collection = $this->orderRepository->with('guestService')->whereIn('guest_service_id',$servicesIDs)->get()->toArray();
                        return $collection;
                        break;
                    case 'lightServices':
                        $collection = $this->orderRepository->with('lightService')->whereIn('light_service_id',$servicesIDs)->get()->toArray();
                        return $collection;
                        break;

                    default :
                        break;
                }
            }
        });

        return response()->json(['data'=>$user,'success'=>true],200);
    }

    public function activateService(Request $request,Message $message, Hall $hall,
                                    Photographer $photographer, GuestService $guestService, LightService $lightService,
                                    BuffetPackage $buffetPackage)
    {
        $id  = $request->json('id');
        $serviceType = $request->json('service_type');
        $service = false;

        switch ($serviceType) {
            case 'message' :
                $service = $message->find($id);
                break;
            case 'hall' :
                $service = $hall->find($id);
                break;
            case 'photographer' :
                $service = $photographer->find($id);
                break;
            case 'guest_service' :
                $service = $guestService->find($id);
                break;
            case 'light_service' :
                $service = $lightService->find($id);
                break;
            case 'buffet_package':
                $service = $buffetPackage->find($id);
                break;
        }

        if(!$service) {
            return response()->json(['success'=>false,'message'=>'Invalid Service']);
        }

        $service->active = $service->active ? 0 : 1;
        $service->save();

        return response()->json(['success'=>true,'data'=>$service]);
    }



}

