<?php

namespace App\Http\Controllers\Admin;

use App\Src\Models\LightService;
use App\Src\Models\User\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LightServiceController extends Controller
{
    /**
     * @var LightService
     */
    private $lightServiceRepository;
    /**
     * @var User
     */
    private $userRepository;

    /**
     * LightServiceController constructor.
     * @param LightService $lightServiceRepository
     * @param User $userRepository
     */
    public function __construct(LightService $lightServiceRepository,User $userRepository)
    {

        $this->lightServiceRepository = $lightServiceRepository;
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
        $lightservices = $this->lightServiceRepository->paginate(100);
        return view('admin.module.lightservice.index',compact('lightservices'));
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
            'price' => 'required|numeric',

        ]);

        $lightservice = $this->lightServiceRepository->create($request->all());

        return redirect()->action('Admin\LightServiceController@show',$lightservice->id)->with('success','Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lightservice = $this->lightServiceRepository->find($id);
        $users = $this->userRepository->lists('name','id');
        $modelType = 'lightServices';
        return view('admin.module.lightservice.view',compact('lightservice','modelType','users'));
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
            'price' => 'required|numeric',
        ]);
        $lightservice = $this->lightServiceRepository->find($id);
        $lightservice->update($request->all());
        return redirect()->action('Admin\LightServiceController@index')->with('success','Saved');
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
        $record = $this->lightServiceRepository->find($id);
        $record->delete();
        return redirect()->action('Admin\LightServiceController@index')->with('success','Deleted');
    }
}
