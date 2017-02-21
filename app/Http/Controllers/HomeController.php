<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class HomeController extends Controller
{
    const UPLOAD_PATH = '/uploads/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function uploadImage(Request $request)
    {

        $images = $request->images;

        if(count($images)) {
            foreach ($images as $image) {
                $imageName = md5(uniqid(rand() * (time()))) . '.' . $image->getClientOriginalExtension();
                $savePath = public_path() . self::UPLOAD_PATH.$imageName;
                try {
                    Image::make($image)
                        ->resize(null, 736, function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        })
                        ->save($savePath, 100)
                    ;
                    $fullImagePath = app()->make('url')->to(self::UPLOAD_PATH.$imageName);

                    $imageUrls[] = $fullImagePath;

                } catch (\Exception $e) {
                    return response()->json(['success'=>false,'message'=> 'Photo Upload Failed, Path, Error: ' .$e->getMessage()]);
                }
            }
        }

        return response()->json(['success'=>true,'data'=>'success']);

    }
}
