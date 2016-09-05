<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Src\Models\Hall;
use App\Src\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HallController extends Controller
{
    /**
     * @var Hall
     */
    private $hall;
    /**
     * @var Order
     */
    private $orderRepository;

    /**
     * @param Hall $hall
     * @param Order $orderRepository
     */
    public function __construct(Hall $hall, Order $orderRepository)
    {
        $this->hall = $hall;
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        $halls = $this->hall->all();
        return response()->json(['data' => $halls]);
    }

    public function checkAvailability(Request $request)
    {
        $date = Carbon::parse($request->get('date'))->toDateString();
        $hallID = $request->get('hall_id');

        $hallBooked = $this->orderRepository->where('hall_id',$hallID)->whereDate('hall_date','=',$date)->get();

        if(count($hallBooked)) {
            return response()->json(['available'=>false]);
        }
        return response()->json(['available'=>true]);

    }

}
