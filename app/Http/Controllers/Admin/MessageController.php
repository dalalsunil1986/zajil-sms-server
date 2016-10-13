<?php

namespace App\Http\Controllers\Admin;

use App\Src\Models\Message;
use App\Src\Models\User\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    /**
     * @var Message
     */
    private $messageRepository;
    /**
     * @var User
     */
    private $userRepository;

    /**
     * MessageController constructor.
     * @param Message $messageRepository
     * @param User $userRepository
     */
    public function __construct(Message $messageRepository,User $userRepository)
    {

        $this->messageRepository = $messageRepository;
        $this->userRepository = $userRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $messages = $this->messageRepository->paginate(100);
        return view('admin.module.message.index',compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'location' => 'required|string|unique:messages,location',
            'price' => 'required',
            'recepient_count' => 'required|numeric'
        ]);

        $message = $this->messageRepository->create($request->all());

        return redirect()->action('Admin\MessageController@show',$message->id)->with('success','Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = $this->messageRepository->with('services')->find($id);
        $users = $this->userRepository->lists('name','id');
        $modelType = 'messages';
        return view('admin.module.message.view',compact('message','modelType','users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'location' => 'required|string|unique:messages,location,'.$id,
            'price' => 'required',
            'recepient_count' => 'required|numeric'
        ]);
        $message = $this->messageRepository->find($id);
        $message->update($request->all());
        return redirect()->action('Admin\MessageController@index')->with('success','Saved');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $record = $this->messageRepository->find($id);
        $record->delete();
        return redirect()->action('Admin\MessageController@index')->with('success','Deleted');
    }
}
