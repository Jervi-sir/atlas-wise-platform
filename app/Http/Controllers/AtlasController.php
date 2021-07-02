<?php

namespace App\Http\Controllers;

use App\Models\Atlas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

use Google_Client;
use Google_Service_Drive;
use League\Flysystem\Filesystem;
use Illuminate\Support\ServiceProvider;
use Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter;



class AtlasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $atlas = Atlas::first();
        return view('atlas.index', ['atlas' => $atlas]);
    }

   
    public function update(Request $request)
    {
        Storage::extend('google', function ($app, $config) {
            $client = new Google_Client();
            $client->setClientId($config['clientId']);
            $client->setClientSecret($config['clientSecret']);
            $client->refreshToken($config['refreshToken']);
            $service = new Google_Service_Drive($client);
            $adapter = new GoogleDriveAdapter($service, $config['mainFolderId']);
    
            return new Filesystem($adapter);
        });


        $atlas = Atlas::first();
        $atlas->name = $request->name;
        $atlas->description = $request->description;

        $social_data = $request->only('email', 'instagram', 'facebook', 'discord');
        
        if($request->has('image'))
        {
            $disk = Storage::disk('google');

            if($atlas->logo != NULL)
            {
                $file_name = $atlas->logo;
                $disk->delete($file_name);
            }
            
            $image = $request->image;
            $file_name = '._Atlas_logo_' . '.' . $image->extension();

            $img = Image::make($image)->orientate()->encode('jpg', 50);
            $img->encode();

            $disk->put($file_name, $img->getEncoded());

            $pic_id = $disk->getDriver()->getAdapter()->getCacheFileObjectsByName()->id;

            $atlas->logo = $pic_id;

        }

        $atlas->socials = json_encode($social_data);
        $atlas->save();
        
        return back()->with('alert', 'Details Updated!');

        
    }

  
}
