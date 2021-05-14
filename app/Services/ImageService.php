<?php

namespace App\Services; 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;




class ImageService {

    public static function imageUpload(Request $request){

        if($request->hasFile('image_product') && $request->file('image_product')->isValid()){
    
            $originalName = $request->file('image_product')->getClientOriginalName();
            $path = md5($originalName).'.'.$request->file('image_product')->getClientOriginalExtension();
            $upload = $request->file('image_product')->storeAs('imageProducts',$path);

            if($upload){

                return  array( 'path' => $path, 'originalName' => $originalName);
            }

            return false;
    
           
            
        }
    
      
    }



    public static function updateImage( Request $request, $img){

         
        if($request->hasFile('image_product') && $request->file('image_product')->isValid()){

            $originalName = $request->file('image_product')->getClientOriginalName();
            $path = md5($originalName).'.'.$request->file('image_product')->getClientOriginalExtension();

            $exist = Storage::disk('public')->exists('/imageProducts/' .$path);
            

            if($exist){
                return  array( 'path' => $img, 'originalName' => $originalName);
            }else{

                $upload = $request->file('image_product')->storeAs('imageProducts',$path);

                if($upload){

                    return  array( 'path' => $path, 'originalName' => $originalName);
                }

            }

           
        
        }


        return  false;

  
    }

}