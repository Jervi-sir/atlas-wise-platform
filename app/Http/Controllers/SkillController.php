<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{

    //Show skills table
    public function show()
    {
        $skills = Skill::all();
        return view('skills.index', ['skills' => $skills]);
    }

    //add new skills
    public function add(Request $request)
    {
        $name = $request->get('skill');

        if(Skill::where('name', $name)->count() == 0)
        {
            $skill = new Skill;
            $skill->name = $name;
            $skill->save();
            $msg = "skill added successfully.";
            return response()->json(array('msg'=> $msg, 'skill'=> $name), 200);
        }
        else 
        {
            $msg = "skill already exists.";
            return response()->json(array('msg'=> $msg), 100);
        }
    }

    //attach skills to user
    public function link(Request $request)
    {
        $array_skills = json_decode($request->skills);
        $array_lenght = count($array_skills);
        $user = Auth()->user();
        $user_id = Auth()->user()->id;

        $user->skills()->detach();
        for($i = 0; $i < $array_lenght; $i++)
        {
            $skill_id = Skill::where('name', $array_skills[$i])->first()->id;
            $user->skills()->attach($skill_id);
        }

        return back()->with('alert', 'Skills Updated!');
    }


     /* Old Linking, where we save only new skills 
    public function link(Request $request)
    {
        $array_skills = json_decode($request->skills);
        $array_lenght = count($array_skills);
        $user = Auth()->user();
        $user_id = Auth()->user()->id;
        
        for($i = 0; $i < $array_lenght; $i++)
        {
            if($user->skills()->where('name', $array_skills[$i])->count() == 0)
            {
         
                $skill_id = Skill::where('name', $array_skills[$i])->first()->id;
                $user->skills()->attach($skill_id);
            }
        }

        return back();
    }
    */

}
