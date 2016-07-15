<?php

namespace App\Http\Controllers\Admin;

use App\Src\Models\Photographer;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PhotographerController extends Controller
{
    /**
     * @var Photographer
     */
    private $photographerRepository;

    /**
     * PhotographerController constructor.
     * @param Photographer $photographerRepository
     */
    public function __construct(Photographer $photographerRepository)
    {

        $this->photographerRepository = $photographerRepository;
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
        $photographer = $this->photographerRepository->find($id);
        return view('admin.module.photographer.view',compact('photographer'));
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
}
