<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Src\Models\Buffet;
use App\Src\Models\BuffetPackage;
use Illuminate\Http\Request;

class BuffetController extends Controller
{
    /**
     * @var Buffet
     */
    private $buffet;
    /**
     * @var BuffetPackage
     */
    private $buffetPackage;

    /**
     * @param Buffet $buffet
     * @param BuffetPackage $buffetPackage
     */
    public function __construct(Buffet $buffet, BuffetPackage $buffetPackage)
    {
        $this->buffet = $buffet;
        $this->buffetPackage = $buffetPackage;
    }

    public function index()
    {
        $buffets = $this->buffet->with('packages')->get();
        return response()->json(['data' => $buffets]);
    }

    public function getPackages($buffetID)
    {
        $buffetPackages = $this->buffet->with('packages')->find($buffetID);
        return response()->json(['data' => $buffetPackages]);
    }

}
