<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Src\Models\Ad;
use App\Src\Models\Buffet;
use App\Src\Models\BuffetPackage;
use Illuminate\Http\Request;

class AdController extends Controller
{
    /**
     * @var Ad
     */
    private $adRepository;

    /**
     * AdController constructor.
     * @param Ad $adRepository
     */
    public function __construct(Ad $adRepository)
    {
        $this->adRepository = $adRepository;
    }

    public function index()
    {
        $ads = $this->adRepository->latest()->limit(4)->get();
        return response()->json(['data' => $ads]);
    }

}
