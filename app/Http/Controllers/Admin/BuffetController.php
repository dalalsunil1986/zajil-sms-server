<?php

namespace App\Http\Controllers\Admin;

use App\Src\Models\Buffet;
use App\Src\Models\BuffetPackage;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BuffetController extends Controller
{
    /**
     * @var Buffet
     */
    private $buffetRepository;
    /**
     * @var BuffetPackage
     */
    private $buffetPackageRepository;

    /**
     * BuffetController constructor.
     * @param Buffet $buffetRepository
     * @param BuffetPackage $buffetPackageRepository
     */
    public function __construct(Buffet $buffetRepository, BuffetPackage $buffetPackageRepository)
    {
        $this->buffetRepository = $buffetRepository;
        $this->buffetPackageRepository = $buffetPackageRepository;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buffets = $this->buffetRepository->paginate(100);
        return view('admin.module.buffet.index',compact('buffets'));
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

        $buffet = $this->buffetRepository->create($request->all());

        return redirect()->action('Admin\BuffetController@show',$buffet->id)->with('success','Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $buffet = $this->buffetRepository->find($id);
        return view('admin.module.buffet.view',compact('buffet'));

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
            'name' => 'required|string|unique:buffets,name,'.$id,
        ]);
        $buffet = $this->buffetRepository->find($id);
        $buffet->update($request->all());
        return redirect()->action('Admin\BuffetController@index')->with('success','Saved');
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
    }
}
