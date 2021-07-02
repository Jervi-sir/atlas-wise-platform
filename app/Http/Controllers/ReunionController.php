<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Reunion;

class ReunionController extends Controller
{

    public function index()
    {
        return view('reunion.index');
    }

    public function create()
    {   
        $users = User::all();
        return view('reunion.create', ['users' => $users]);
    }

    public function new(Request $request)
    {   
        
        $reunion = new Reunion;
        $reunion->creator_id = Auth()->user()->id;
        $reunion->name = $request->name;
        $reunion->date = $request->date;
        $reunion->description = $request->description;
        $reunion->save();
        
        if($request->all == "on")
        {
            foreach(User::all() as $member)
            {
                $reunion->invited()->attach($member);
            }
        } else 
        {
            foreach($request->members as $member)
            {
                $reunion->invited()->attach($member);
            }
        }
        

        return back()->with('alert', 'Reunion Created Successfully!');
    }

    public function edit()
    {
        $users = User::all();
        return view('reunion.edit', ['users' => $users]);
    }

    public function show()
    {
        $reunions = Auth()->user()->make_reunion()->get();
        return view('reunion.show', ['reunions' => $reunions]);
    }


    public function updateShow(Request $request)
    {
        $reunion = Auth()->user()->make_reunion()->find($request->reunion_id);   
        return view('reunion.showEdit', ['item' => $reunion]);
    }


    public function update(Request $request)
    {
        $reunion = Reunion::find($request->reunion_id);
        $reunion->name = $request->name;
        $reunion->date = $request->date;
        $reunion->description = $request->description;
        $reunion->save();

        foreach($request->members as $member)
        {
            $reunion->invited()->detach($member);
            $reunion->invited()->attach($member);
        }

        return view('reunion.showEdit', ['item' => $reunion])->with('alert', 'Updated Successfully!');
    }


    public function delete(Request $request)
    {
        $reunion = Reunion::find($request->reunion_id);
        $reunion->invited()->detach();
        $reunion->delete();

        $reunions = Auth()->user()->make_reunion()->get();
        return back()->with('alert', 'Updated Successfully!');
    }
}
