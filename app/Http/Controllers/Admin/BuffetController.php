<?php

namespace App\Http\Controllers\Admin;

use App\Src\Models\Buffet;
use App\Src\Models\BuffetPackage;
use App\Src\Models\User\User;
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
     * @var User
     */
    private $userRepository;

    /**
     * BuffetController constructor.
     * @param Buffet $buffetRepository
     * @param BuffetPackage $buffetPackageRepository
     * @param User $userRepository
     */
    public function __construct(Buffet $buffetRepository, BuffetPackage $buffetPackageRepository, User $userRepository)
    {
        $this->buffetRepository = $buffetRepository;
        $this->buffetPackageRepository = $buffetPackageRepository;
        $this->userRepository = $userRepository;
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
        $users = $this->userRepository->lists('name','id');
        $modelType = 'buffets';
        return view('admin.module.buffet.view',compact('buffet','users','modelType'));
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
        $record = $this->buffetRepository->find($id);
        $record->packages()->delete();
        $record->delete();
        return redirect()->action('Admin\BuffetController@index')->with('success','Deleted');
        //
    }

    public function getPackages($buffetID)
    {
        $buffet = $this->buffetRepository->with('packages')->find($buffetID);

        return view('admin.module.buffet.package.index',compact('buffet'));
    }

    public function getPackage($packageID)
    {
        $package = $this->buffetPackageRepository->with('buffet')->find($packageID);
        return view('admin.module.buffet.package.view',compact('package'));
    }

    public function editPackage(Request $request,$packageID)
    {
        $this->validate($request, [
            'description' => 'required',
            'price' => 'required'
        ]);
        $package = $this->buffetPackageRepository->with('buffet')->find($packageID);

        $package->update($request->all());
        return redirect()->back()->with('success','Updated');

    }

    public function createPackage(Request $request)
    {
        $this->validate($request,[
            'description' => 'required',
            'price' =>'required'
        ]);
        $package = $this->buffetPackageRepository->create($request->all());
        return redirect()->back()->with('success','Saved');
    }

    public function deletePackage($packageID)
    {

        $package = $this->buffetPackageRepository->find($packageID);
        $package->delete();
        return redirect()->back()->with('success','Deleted');
    }

}
