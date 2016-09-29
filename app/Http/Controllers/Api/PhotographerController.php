<?php

namespace App\Http\Controllers\Api;

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

    public function activate(Request $request)
    {
        $value = $request->json('value');
        $photographerID = $request->json('id');

        $photographer = $this->photographer->find($photographerID);
        $photographer->active = $value;
        $photographer->save();
        return response()->json(['success'=>true,'data'=>$photographer]);
    }
}
