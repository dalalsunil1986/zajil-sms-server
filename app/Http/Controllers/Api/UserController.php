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
        $user = $this->userRepository->find($userID);
        $services = $this->userService->where('user_id',$user->id);
        $photographers = $services->where('service_type','photographer')->get();
        $guestServices = $services->where('service_type','guestservice')->get();
        $photographerArray = [];
        foreach($photographers as $photographer) {
            $photographerArray[] = $photographer->service;
        }
        $user->photographers = $photographerArray;

        return response()->json(['data'=>$user,'success'=>true],200);
    }

    public function getAppointments($userID)
    {
        $user = $this->userRepository->find($userID);
        $appointments = [];
        $appointments['photographers'] = [];
        $user->appointments = $appointments;
        return response()->json(['data'=>$user,'success'=>true],200);
    }


}
