<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Src\Models\BlockedDate;
use App\Src\Models\User\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * @var User
     */
    private $userRepository;
    /**
     * @var BlockedDate
     */
    private $blockedDate;

    /**
     * UserController constructor.
     * @param User $userRepository
     * @param BlockedDate $blockedDate
     */
    public function __construct(User $userRepository,BlockedDate $blockedDate)
    {
        $this->userRepository = $userRepository;
        $this->blockedDate = $blockedDate;
    }

    public function blockDate()
    {
        
    }

    public function checkAvailability(Request $request)
    {
        $date = Carbon::parse($request->get('date'))->toDateString();
        $serviceID = $request->get('service_id');
        $serviceType = $request->get('service_type');
//        $serviceID = $request->json('service_id');
//        $serviceType = $request->json('service_type');

        $booked = $this->blockedDate
            ->where('service_id',$serviceID)
            ->where('service_type',$serviceType)
            ->whereDate('date','=',$date)->get();

        if(count($booked)) {
            return response()->json(['available'=>false]);
        }

        return response()->json(['available'=>true]);

    }


}

