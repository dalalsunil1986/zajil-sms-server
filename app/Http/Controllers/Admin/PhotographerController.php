<?php

namespace App\Http\Controllers\Admin;

use App\Src\Models\Photographer;
use App\Src\Models\User\User;
use App\Src\Models\UserService;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class PhotographerController extends Controller
{
    /**
     * @var Photographer
     */
    private $photographerRepository;
    /**
     * @var User
     */
    private $userRepository;
    /**
     * @var UserService
     */
    private $userService;

    /**
     * PhotographerController constructor.
     * @param Photographer $photographerRepository
     * @param User $userRepository
     * @param UserService $userService
     */
    public function __construct(Photographer $photographerRepository, User $userRepository, UserService $userService)
    {

        $this->photographerRepository = $photographerRepository;
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
        //
        $photographers = $this->photographerRepository->paginate(100);
        return view('admin.module.photographer.index',compact('photographers'));
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
        //
        $this->validate($request, [
            'name' => 'required|string|unique:buffets,name',
            'price' => 'required',

        ]);

        $photographer = $this->photographerRepository->create($request->all());

        return redirect()->action('Admin\PhotographerController@show',$photographer->id)->with('success','Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $photographer = $this->photographerRepository->with('services.user')->find($id);
        $users = $this->userRepository->lists('name','id');
        return view('admin.module.photographer.view',compact('photographer','users'));
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
        //
        $this->validate($request, [
            'name' => 'required|string|unique:buffets,name,'.$id,
        ]);
        $photographer = $this->photographerRepository->find($id);
        $photographer->update($request->all());
        return redirect()->action('Admin\PhotographerController@index')->with('success','Saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = $this->photographerRepository->find($id);
        $record->delete();
        return redirect()->action('Admin\PhotographerController@index')->with('success','Deleted');
    }

    public function attachToUser(Request $request)
    {
        $this->validate($request,[
            'user_id' => 'required|integer',
            'photographer_id' => 'required|integer'
        ]);

        $user = $this->userRepository->find($request->user_id);

        $photographer = $this->photographerRepository->find($request->photographer_id);

        $photographer->services()->create(['user_id'=>$user->id]);

        return $photographer->services;
    }
}
