<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\Storage;
use Google_Client;
use Google_Service_Drive;
use League\Flysystem\Filesystem;
use Illuminate\Support\ServiceProvider;
use Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter;


class UploaderController extends Controller
{

    //Upload / Update Schedual pic
    public function uploadSchedual(Request $request)
    {  

        Storage::extend('google', function ($app, $config) {
            $client = new Google_Client();
            $client->setClientId($config['clientId']);
            $client->setClientSecret($config['clientSecret']);
            $client->refreshToken($config['refreshToken']);
            $service = new Google_Service_Drive($client);
            $adapter = new GoogleDriveAdapter($service, $config['scheduleFolderId']);
    
            return new Filesystem($adapter);
        });


        $user = Auth()->user();
        $profile = $user->profile()->first();


        if($request->has('image'))
        {
            $disk = Storage::disk('google');

            if($profile->schedual_pic != NULL)
            {
                $file_name = $profile->schedual_pic;
                $disk->delete($file_name);
            }
            
            $image = $request->image;
            $file_name = Auth()->user()->name . '_schedual' . '.' . $image->extension();

            $img = Image::make($image)->orientate()->encode('jpg', 50);
            $img->encode();

            $disk->put($file_name, $img->getEncoded());

            $pic_id = $disk->getDriver()->getAdapter()->getCacheFileObjectsByName()->id;
            $profile->schedual_pic = $pic_id;
            $profile->save();

            return back()->with('alert', 'Schedual Uploaded!');

        }
        return back()->with('error', 'Nothing Changed!');
    }

    
/*
        if($request->has('image'))
        {
            if($profile->schedual_pic != NULL)
            {
                $file_name = $profile->schedual_pic;
                $path = 'images/schedual/' . $file_name;
                File::delete($path);
            }

            $file = $request->image;
            $file_name = Auth()->user()->name . '_schedual_' . '.' . $file->extension();
            $img = Image::make($file)->orientate();
            $img->save(public_path('\images\/schedual\/') . $file_name, 50);

            $profile->schedual_pic = $file_name;
            $profile->save();


        }

*/



    /*
            $file = $request->image;
            $file_name = Auth()->user()->name . '_schedual_' . time() . '.' . $file->extension();
            $img = \Image::make($file);
            $img->save(public_path('\images\/schedual\/') . $file_name, 50);
            */


    /*

            //Get file from the browser 
             $file= $request->image;
             // Resize and encode to required type
             $img = Image::make($file)->orientate()->encode('jpg', 50);
             //Provide the file name with extension 
             $filename = Auth()->user()->name . '_schedual_' . time() . '.' . $file->extension();
            //Put file with own name
            Storage::put($filename, $img);
            //Move file to your location 
            Storage::move($filename, 'public/images/schedual/' . $filename);
            //now insert into database 


    */

    /*
        $imageName = Auth()->user()->name . '_schedual_' . time() . '.' . $request->image->extension();  
        $img = Image::make($request->image)->resize(300, 200);
        $img->move(public_path('images'), $imageName);
        $profile = Auth()->user()->profile()->first();
        $profile->schedual_pic = $imageName;
        $profile->save();
        
        $image = $request->file('image');
        $input['product_image'] = Auth()->user()->name . '_schedual_' . time() . '.' . $image->extension();

        // Get path of thumbnails folder from /public
        $thumbnailFilePath = public_path('images');

        $img = Image::make($image->path());

        // Image resize to given aspect dimensions
        // Save this thumbnail image to /public/thumbnails folder
        $img->resize(110, 110, function ($const) {
            $const->aspectRatio();
        })->save($thumbnailFilePath . '/' . $input['product_image']);

        // Product images folder
        $ImageFilePath = public_path('images');

        // Store product original images
        $image->move($ImageFilePath, $input['product_image']);

    */

}
