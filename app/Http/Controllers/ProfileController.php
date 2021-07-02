<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;
use Image;
use Google_Client;
use Google_Service_Drive;
use League\Flysystem\Filesystem;
use Illuminate\Support\ServiceProvider;
use Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter;


class ProfileController extends Controller
{
    //Display Profile Page
    public function show()
    {
        return view('profile.index');
    }

    //Update Socials
    public function updateSocials(Request $request)
    {
        $social_data = $request->only('facebook', 'instagram', 'twitter', 'youtube', 'github', 'linkedin');
        $user_id = Auth()->user()->id;
        
        $profile = Profile::where('user_id' , $user_id)->first();
        $profile->socials = json_encode($social_data);
        $profile->save();
        
        return back()->with('alert', 'Social Media Updated!');
    }

    //Update details
    public function updateDetails(Request $request)
    {
        Storage::extend('google', function ($app, $config) {
            $client = new Google_Client();
            $client->setClientId($config['clientId']);
            $client->setClientSecret($config['clientSecret']);
            $client->refreshToken($config['refreshToken']);
            $service = new Google_Service_Drive($client);
            $adapter = new GoogleDriveAdapter($service, $config['profileFolderId']);
    
            return new Filesystem($adapter);
        });


        $user = Auth()->user();
        $user_id = $user->id;
        $profile = Profile::where('user_id' , $user_id)->first();
        $profile->full_name = $request->get('full-name');
        $profile->phone_number = $request->get('phone-number');
        $profile->birth_day = $request->get('birth-day');
        $profile->gender = $request->get('gender');
        $profile->speciality_id = $request->get('speciality');
        $profile->description = $request->get('description');

        $user->name = $request->get('username');

        if($request->image != NULL)
        {
            $disk = Storage::disk('google');

            if($profile->profile_pic != NULL)
            {
                $file_name = $profile->schedual_pic;
                $disk->delete($file_name);
            }

            $image = $request->image;
            $file_name = Auth()->user()->name . '_profile' . '.' . $image->extension();
            $img = Image::make($image)->orientate()->encode('jpg', 50);
            $img->encode();
            
            $disk->put($file_name, $img->getEncoded());
            
            $pic_id = $disk->getDriver()->getAdapter()->getCacheFileObjectsByName()->id;
            
            $profile->profile_pic = $pic_id;
            
        }
        
        $profile->save();
        $user->save();
        
        return back()->with('alert', 'Details Updated!');
    }

    //reset Password
    public function password(Request $request)
    {
        $user = Auth()->user();
        $user_pswrd = $user->password;
        $old_password = Hash::make($request->get('old-password'));

        dd($old_password);
    }
    


}
