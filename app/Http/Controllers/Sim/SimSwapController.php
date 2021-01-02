<?php

namespace App\Http\Controllers\Sim;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use App\models\Image;

class SimSwapController extends Controller
{
    public function uploadDocuments(Request $request)
    {
        ////////////////////////////////upload Font immage/////////////////////////////////////
        if ($file = base64_decode($request['uploadFontPhoto'])) 
        {
            $destinationPath = public_path('role'.$request->user()->role.'/');;
            if (!is_dir($destinationPath)) {
                mkdir($destinationPath);
            }
            $destinationPath = public_path('role'.$request->user()->role.'/fontDocu/');
            if (!is_dir($destinationPath)) {
                mkdir($destinationPath);
            }
                
            try 
            {
                $time = md5(date("Y/m/d-H:ia")); 
                $imageName = Str::random(10).'.'.'jpeg';
                $profileImage = $time.'_'.$imageName;
                $productImages=  'role'.$request->user()->role.'/fontDocu/'.$profileImage;
                
                $product = array('image_url'=>$productImages,'image_type' => 'font_docu','user_id' => $request->user()->id);
                $imageId = Image::create($product)->id;
                if($imageId){
                    $success1 = file_put_contents(public_path().'/role'.$request->user()->role.'/fontDocu/'.$profileImage, $file);
                     if($success1)
                     {
                         ////////////////////////// upload back immage ////////////////////////////////////////////
                        if ($file1 = base64_decode($request['uploadBackPhoto'])) 
                        {
                            $destinationPath1 = public_path('role'.$request->user()->role.'/');;
                            if (!is_dir($destinationPath1)) {
                                mkdir($destinationPath1);
                            }
                            $destinationPath1 = public_path('role'.$request->user()->role.'/backDocu/');
                            if (!is_dir($destinationPath1)) {
                                mkdir($destinationPath1);
                            }
                                
                            try 
                            {
                                $time1 = md5(date("Y/m/d-H:ia")); 
                                $imageName1 = Str::random(10).'.'.'jpeg';
                                $profileImage1 = $time1.'_'.$imageName1;
                                $productImages1=  'role'.$request->user()->role.'/backDocu/'.$profileImage1;
                                
                                $product1 = array('image_url'=>$productImages1,'image_type' => 'back_docu','user_id' => $request->user()->id);
                                $imageId1 = Image::create($product1)->id;
                                if($imageId1){
                                    $success2 = file_put_contents(public_path().'/role'.$request->user()->role.'/backDocu/'.$profileImage1, $file1);
                                        if($success2)
                                        {
                                            //////////////////////////////// upload sim or gd //////////////////////////////
                                            if ($file2 = base64_decode($request['uploadSimOrGdPhoto'])) 
                                            {
                                                $destinationPath2 = public_path('role'.$request->user()->role.'/');;
                                                if (!is_dir($destinationPath2)) {
                                                    mkdir($destinationPath2);
                                                }
                                                $destinationPath2 = public_path('role'.$request->user()->role.'/simOrGd/');
                                                if (!is_dir($destinationPath2)) {
                                                    mkdir($destinationPath2);
                                                }
                                                    
                                                try 
                                                {
                                                    $time2 = md5(date("Y/m/d-H:ia")); 
                                                    $imageName2 = Str::random(10).'.'.'jpeg';
                                                    $profileImage2 = $time2.'_'.$imageName2;
                                                    $productImages2=  'role'.$request->user()->role.'/simOrGd/'.$profileImage2;
                                                    
                                                    $product2 = array('image_url'=>$productImages2,'image_type' => 'sim_or_gd','user_id' => $request->user()->id);
                                                    $imageId2 = Image::create($product2)->id;
                                                    if($imageId2){
                                                        $success3 = file_put_contents(public_path().'/role'.$request->user()->role.'/simOrGd/'.$profileImage2, $file2);
                                                        return response()->json(['success'=>'Document upload successfully.','image_id' => ['font_image'=> $imageId,'back_image'=> $imageId1,'font_image'=> $imageId2]]);
                                                    }
                                                    else{
                                                        return response()->json(['error'=>'please Select Sim Or Gd Immage.']);
                                                    }
                                                } 
                                                catch(\Exception $imageTableException)
                                                {
                                                    if($imageTableException){
                                                        return response()->json(['error'=>'Dose not upload sim or gd number']);
                                                    }
                                                }
                                            }
                                        }else{
                                            return response()->json(['error'=>'Dose not upload back site document.']);
                                        }
                                }
                                else{
                                    return response()->json(['error'=>'Back document Dose not exist.']);
                                }
                            } 
                            catch(\Exception $imageTableException)
                            {
                                if($imageTableException){
                                    return response()->json(['error'=>$imageTableException]);
                                }
                            }
                        }
                     }
                }
                else{
                    return response()->json(['error'=>'please try once.']);
                }
            } 
            catch(\Exception $imageTableException)
            {
                if($imageTableException){
                    return response()->json(['error'=>$imageTableException]);
                }
            }
        }
    }


    public function addSimData(Request $request)
    {
        return response()->json($request->all());
    }
}
