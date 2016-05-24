<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Src\Models\LightService;
use Illuminate\Http\Request;

class LightServiceController extends Controller
{
    /**
     * @var LightService
     */
    private $lightService;

    /**
     * @param LightService $lightService
     */
    public function __construct(LightService $lightService)
    {
        $this->lightService = $lightService;
    }

    public function index()
    {
        $lightServices = $this->lightService->all();
        return response()->json(['data' => $lightServices]);
    }

}
