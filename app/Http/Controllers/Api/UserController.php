<?php

namespace App\Http\Controllers\Api;

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
     * UserController constructor.
     * @param User $userRepository
     * @param UserService $userService
     */
    public function __construct(User $userRepository,UserService $userService)
    {

        $this->userRepository = $userRepository;
        $this->userService = $userService;
    }

    public function getServices($userID)
    {
        $user = $this->userRepository->find($userID);
        // guestServive : {}
        $services = $this->userService->where('user_id',$user->id);
        $photographers = $services->where('service_type','photographer')->get();
        $guestServices = $services->where('service_type','guestservice')->get();
        $p = [];
        foreach($photographers as $photographer) {
            $p[] = $photographer->service;
        }

        $user->photographers = $p;
//        $user->photographers = $photographers->service;
//        $user->guestServices = $guestServices;
        return response()->json(['data'=>$user,'success'=>true],200);
    }

}
