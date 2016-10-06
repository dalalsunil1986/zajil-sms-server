<?php

namespace App\Http\Controllers\Api;

use App\Src\Models\Order;
use App\Src\Models\User\User;
use App\Src\Models\UserService;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

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
        $user = $this->userRepository->find($userID);
//        $user->userOrders = $user->services->groupBy('service_type')->map(function($serviceables) {
//            $serviceables->map(function($serviceable){
//                return $serviceable->toArray();
////                return $serviceable->service->orders->toArray();
//            });
//        });
        $userOrders = [];
        $userOrders['photographers'] = [];
        $user->userOrders = $userOrders;

        return response()->json(['data'=>$user,'success'=>true],200);
    }


}

