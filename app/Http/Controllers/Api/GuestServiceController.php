<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Src\Models\GuestService;
use Illuminate\Http\Request;

class GuestServiceController extends Controller
{
    /**
     * @var GuestService
     */
    private $guestService;

    /**
     * @param GuestService $guestService
     */
    public function __construct(GuestService $guestService)
    {
        $this->guestService = $guestService;
    }

    public function index()
    {
        $guestServices = $this->guestService->all();
        return response()->json(['data' => $guestServices]);
    }

}
