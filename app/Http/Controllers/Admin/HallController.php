<?php

namespace App\Http\Controllers\Admin;

use App\Src\Models\Hall;
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
     * HallController constructor.
     * @param Hall $hallRepository
     */
    public function __construct(Hall $hallRepository)
    {
        $this->hallRepository = $hallRepository;
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

        $hall = $this->hallRepository->create($request->all());

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
        return view('admin.module.hall.view',compact('hall'));
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
