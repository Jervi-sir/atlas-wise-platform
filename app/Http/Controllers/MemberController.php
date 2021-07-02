<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\User;

class MemberController extends Controller
{

    public function index()
    {   
        $users = User::all();
        return view('members.index', ['users' => $users]);
    }

    public function list()
    {
        $result = array();
        foreach (User::all() as $user)
        {
            if(Auth()->user()->id == $user->id)
            {

                $profile = $user->profile()->first();
                $skills = $user->skills()->get();
                $skills_array = array();
                
                foreach ($skills as $skill) 
                {
                    array_push($skills_array, $skill->name);
                }
                
                $mmbr = array(  "name"=> $user->name,
                                "email"=> $user->email,
                                "role"=> $user->role()->first()->name,
                                "full_name"=> $profile->full_name,
                                "phone_number"=> $profile->phone_number,
                                "gender"=> $profile->gender,
                                "birth_day"=> $profile->birth_day,
                                "description"=> $profile->description,
                                "socials"=> $profile->socials,
                                "skills"=> $skills_array,
                                "speciality"=> $profile->speciality()->first() ? $profile->speciality()->first()->name : '',
                        );
        
                array_push($result, $mmbr);
            }
        }

        return $result;
    }

 
    public function list2()
    {
        $users = User::all();
        return view('members.table', ['users' => $users]);
    }


}
