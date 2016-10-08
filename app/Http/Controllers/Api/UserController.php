<?php

namespace App\Http\Controllers\Api;

use App\Src\Models\Order;
use App\Src\Models\User\User;
use App\Src\Models\UserService;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        $user = $this->userRepository->with('services.service')->find($userID);
        $user->userServices = $user->services->groupBy('service_type')->map(function($serviceable) {
            return $serviceable->pluck('service');
        });
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
                    case 'photographers':
                        $collection = $this->orderRepository->with('photographer')->whereIn('photographer_id',$servicesIDs)->get()->toArray();
                        return $collection;
                        break;
                    case 'guestServices':
                        $collection = $this->orderRepository->with('guestService')->whereIn('guest_service_id',$servicesIDs)->get()->toArray();
                        return $collection;
                        break;
                    default :
                        break;
                }
            }
//            $serviceable->map(function($service) use ($user) {
//                switch ($service->service_type) {
//                    case 'photographers':
//                        $collection = $this->orderRepository->where('photographer_id',$user->id)->get()->toArray();
//                        return $service;
//                        break;
//                    case 'guestServices':
//                        $collection = $this->orderRepository->where('guest_service_id',$user->id)->get()->toArray();
//                        return $collection;
//                        break;
//                    default :
//                        break;
//                }
//            });
        });

        return response()->json(['data'=>$user,'success'=>true],200);
//        return response()->json(['data'=>$user,'success'=>true],200);
    }


}

