<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BoardServiceController extends Controller
{
    /**
     */
    public function __construct()
    {
    }

    public function index()
    {
        return response()->json(['data' => '']);
    }

}
