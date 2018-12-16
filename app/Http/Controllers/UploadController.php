<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public static function store(Request $request,$folder)
    {
        //dd($request->file('image_name'));
        $image = $request->file('image_name');
        $name = $request->file('image_name')->getClientOriginalName();
       
        $image_name = $request->file('image_name')->getRealPath();
        $path = "mobileaid/".$folder."/";
        $uniqueid = Date('Ymdhis').rand(1,99999)."/";
        $thumbnailImageSize = array("width" => 166, "height" => 106, "crop"=>"scale");
        $singleImageSize = array("width" => 870, "height" => 570, "crop"=>"scale");
      
        $imagename_no_ext = explode('.',$name);
        Cloudder::upload($image_name, $path.$uniqueid.$request->file('image_name')->getClientOriginalName(), array( "eager" => array($singleImageSize, $thumbnailImageSize )));
        $CloudderArray = Cloudder::getResult();
        $allImages = [];
        $singleImage = $CloudderArray['eager'][0]['url']; //singlepage image
        $thumbnailImage = $CloudderArray['eager'][1]['url'];
        $image_url = $CloudderArray['url'];
        $allImages = [ "single" => $singleImage, "thumbnail" => $thumbnailImage, "imageurl" => $image_url];
        if($_SERVER['REMOTE_ADDR'] == '127.0.0.1'):
            //save to uploads directory
            $image->move(public_path("uploads"), $name);
        endif;
        return $allImages;
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
