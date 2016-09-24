<?php

namespace App\Http\Controllers\Admin;

use App\Src\Models\User\User;
use App\Src\Models\UserService;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * @var User
     */
    private $userRepository;
    /**
     * @var UserService
     */
    private $userService;

    /**
     * UserController constructor.
     * @param User $userRepository
     * @param UserService $userService
     */
    public function __construct(User $userRepository,UserService $userService)
    {

        $this->userRepository = $userRepository;
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userRepository->paginate(100);
        return view('admin.module.user.index',compact('users'));
    }

    public function show($id)
    {
        $user= $this->userRepository->find($id);
        return view('admin.module.user.view',compact('user'));
    }

    public function store(Request $request)
    {
        $this->validate($request,['email'=>'required|unique:users,email','name'=>'required','password'=>'required']);

        $user = $this->userRepository->create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'name' => $request->name
        ]);

        return redirect()->back()->with('success','User Saved');
    }

    public function attachService(Request $request)
    {
        $modelID = $request->model_id;
        $modelType = $request->model_type;
        $userID = $request->user_id;

        $this->validate($request,[
            'model_id'=> 'required|integer',
            'model_type' => 'required',
            'user_id' => 'required|exists:users,id'
        ]);

        $userService = $this->userService->create([
            'service_id' => $modelID,
            'service_type' => $modelType,
            'user_id' => $userID
        ]);

        return redirect()->back()->with('success','User Service Saved');

    }

}
