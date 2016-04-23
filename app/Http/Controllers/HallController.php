<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Src\Models\Hall;
use Illuminate\Http\Request;

class HallController extends Controller
{
    /**
     * @var Hall
     */
    private $hall;

    /**
     * @param Hall $hall
     */
    public function __construct(Hall $hall)
    {
        $this->hall = $hall;
    }

    public function index()
    {
        $halls = $this->hall->all();
        return response()->json(['data' => $halls]);
    }

}
