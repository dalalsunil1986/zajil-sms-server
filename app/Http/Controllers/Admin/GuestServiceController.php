<?php

namespace App\Http\Controllers\Admin;

use App\Src\Models\GuestService;
use App\Src\Models\User\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class GuestServiceController extends Controller
{
    /**
     * @var GuestService
     */
    private $guestServiceRepository;
    /**
     * @var User
     */
    private $userRepository;

    /**
     * GuestServiceController constructor.
     * @param GuestService $guestServiceRepository
     * @param User $userRepository
     */
    public function __construct(GuestService $guestServiceRepository, User $userRepository)
    {
        $this->guestServiceRepository = $guestServiceRepository;
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
        $guestservices = $this->guestServiceRepository->paginate(100);
        return view('admin.module.guestservice.index',compact('guestservices'));
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

        $guestservice = $this->guestServiceRepository->create($request->all());

        return redirect()->action('Admin\GuestServiceController@show',$guestservice->id)->with('success','Saved');
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
        $guestservice = $this->guestServiceRepository->find($id);
        $users = $this->userRepository->lists('name','id');
        $modelType = 'guestServices';
        return view('admin.module.guestservice.view',compact('guestservice','users','modelType'));
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
        $guestservice = $this->guestServiceRepository->find($id);
        $guestservice->update($request->all());
        return redirect()->action('Admin\GuestServiceController@index')->with('success','Saved');
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
        $record = $this->guestServiceRepository->find($id);
        $record->delete();
        return redirect()->action('Admin\GuestServiceController@index')->with('success','Deleted');
    }
}
