<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Src\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * @var Message
     */
    private $message;

    /**
     * @param Message $message
     */
    public function __construct(Message $message )
    {
        $this->message = $message;
    }

    public function index()
    {
        $messages = $this->message->all();
        return response()->json(['data' => $messages]);
    }

}
