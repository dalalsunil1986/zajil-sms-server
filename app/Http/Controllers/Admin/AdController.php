<?php

namespace App\Http\Controllers\Admin;

use App\Src\Models\Ad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class AdController extends Controller
{
    /**
     * @var Ad
     */

    const UPLOAD_PATH =  '/uploads/';

    private $adRepository;

    /**
     * AdController constructor.
     * @param Ad $adRepository
     */
    public function __construct(Ad $adRepository)
    {
        $this->adRepository = $adRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = $this->adRepository->paginate(100);
        return view('admin.module.ad.index',compact('ads'));
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
            'cover'          => 'image',
        ]);
        $file = $request->file('cover');
        $imageName = md5(uniqid(rand() * (time()))) . '.' . $file->getClientOriginalExtension();
        $imagePath = self::UPLOAD_PATH.$imageName;
        try {
            Image::make($file)
                ->resize(null, 736, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->save(public_path().$imagePath,100);
            $fullImagePath = app()->make('url')->to($imagePath);
            $this->adRepository->create([
                'url' => $fullImagePath,
                'user_id' => auth()->user()->id
            ]);

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Upload Error');
        }

        return redirect('admin/ad')->with('message', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = $this->adRepository->find($id);
        $imagePath = $record->url;
        $imageName = substr($imagePath, strrpos($imagePath, '/') + 1); // get filename from full path
        $imageFile = public_path().self::UPLOAD_PATH.$imageName; // get local image file
        if (file_exists($imageFile)) {
            unlink($imageFile);
        }
        $record->delete();
        return redirect()->back()->with('success','Deleted');
    }
}
