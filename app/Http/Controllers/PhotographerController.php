<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Src\Models\Photographer;
use Illuminate\Http\Request;

class PhotographerController extends Controller
{
    /**
     * @var Photographer
     */
    private $photographer;

    /**
     * @param Photographer $photographer
     */
    public function __construct(Photographer $photographer)
    {
        $this->photographer = $photographer;
    }

    public function index()
    {
        $photographers = $this->photographer->all();
        return response()->json(['data' => $photographers]);
    }

}
