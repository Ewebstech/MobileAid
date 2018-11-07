<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Event;
use Validator;
use App\Category;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use JD\Cloudder\Facades\Cloudder;

class ProductController extends Controller
{
    public function store(Request $request) {
        // dd($request->all());
        
        // return $this->UploadMultipleImages($request);
        if($request->hasFile('logo')){
            $logos = $request->file('logo');
        
            foreach($logos as $logo) {

                $imageNameWithNoExtension = explode('.', $logo->getClientOriginalName()); 
        
                //cloudinary
                    $height = 210;
                    $width = 390;
                    $image_size = array("height"=>$height, "width"=>$width, "crop"=>"scale");
                    //$image_name = $request->file('logo')->getRealPath();;
                    $image_name = $logo->getRealPath();;
                    $path = "advert-app/companies/";
                    $uniqueid = Date('Ymdhis').rand(1,99999);
                    //uploads the image to cloudinary
                    Cloudder::upload($image_name, $path.$uniqueid.$imageNameWithNoExtension[0], $image_size);
                    $CloudderArray = Cloudder::getResult();
                    $imageInformation = [];
                    $image_url = $CloudderArray['url'];
                    $image_publicid = $CloudderArray['public_id'];
                    dd($imageInformation = [$image_url, $image_publicid]);
                //cloundinary ends here

            }
        
            
        }
    }
}
