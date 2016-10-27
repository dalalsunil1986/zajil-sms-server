<?php

namespace App\Http\Controllers\Admin;

use App\Src\Models\Hall;
use App\Src\Models\User\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HallController extends Controller
{
    /**
     * @var Hall
     */
    private $hallRepository;
    /**
     * @var User
     */
    private $userRepository;

    /**
     * HallController constructor.
     * @param Hall $hallRepository
     * @param User $userRepository
     */
    public function __construct(Hall $hallRepository, User $userRepository)
    {
        $this->hallRepository = $hallRepository;
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
        $halls = $this->hallRepository->paginate(100);
        return view('admin.module.hall.index',compact('halls'));
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
        ]);

        $hall = $this->hallRepository->create(array_merge($request->all(),['active'=>1]));

        return redirect()->action('Admin\HallController@show',$hall->id)->with('success','Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hall = $this->hallRepository->find($id);
        $users = $this->userRepository->lists('name','id');
        $modelType = 'halls';
        return view('admin.module.hall.view',compact('hall','users','modelType'));
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
            'name' => 'required|string|unique:halls,name,'.$id,
        ]);
        $hall = $this->hallRepository->find($id);
        $hall->update($request->all());
        return redirect()->action('Admin\HallController@index')->with('success','Saved');
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
        //
        $record = $this->hallRepository->find($id);
        $record->delete();
        return redirect()->action('Admin\HallController@index')->with('success','Deleted');
    }
}
