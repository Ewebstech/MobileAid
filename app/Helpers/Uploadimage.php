<?php
namespace App\Helper;
use Auth;
use App\Event;
use Validator;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use JD\Cloudder\Facades\Cloudder;

Trait Uploadimage 
{
    
    public function Uploadimage(Request $request) {
                //if the request has an image and was successfully uploaded
                if($request->hasFile('logo') and $request->file('logo')->isValid()){
                    
                    $imageNameWithNoExtension = explode('.', $request->logo->getClientOriginalName()); 
                   
                    //cloudinary
                        $height = 210;
                        $width = 390;
                        $image_size = array("height"=>$height, "width"=>$width, "crop"=>"scale");
                        $image_name = $request->file('logo')->getRealPath();;
                        $path = "advert-app/companies/";
                        $uniqueid = Date('Ymdhis').rand(1,99999);
                        //uploads the image to cloudinary
                        Cloudder::upload($image_name, $path.$uniqueid.$imageNameWithNoExtension[0], $image_size);
                        $CloudderArray = Cloudder::getResult();
                        $imageInformation = [];
                        $image_url = $CloudderArray['url'];
                        $image_publicid = $CloudderArray['public_id'];
                        return $imageInformation = [$image_url, $image_publicid];
                    //cloundinary ends here
                    
                } else{
                    return $imageInformation = ['null', 'null'];
                }
   
    }
    
}