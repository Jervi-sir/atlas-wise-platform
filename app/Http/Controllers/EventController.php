<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        return view('event.index');
    }

    public function create()
    {   
        $users = User::all();
        return view('event.create', ['users' => $users]);
    }

    public function new(Request $request)
    {   
        $event = new Event;
        $event->creator_id = Auth()->user()->id;
        $event->name = $request->name;
        $event->date = $request->date;
        $event->description = $request->description;
        $event->save();
        
        if($request->all == "on")
        {
            foreach(User::all() as $member)
            {
                $event->invited()->attach($member);
            }
        } else 
        {
            foreach($request->members as $member)
            {
                $event->invited()->attach($member);
            }
        }
        

        return back()->with('alert', 'Event Created Successfully!');
    }

    public function edit()
    {
        $users = User::all();
        return view('event.edit', ['users' => $users]);
    }

    public function show()
    {
        $events = Auth()->user()->make_event()->get();
        return view('event.show', ['events' => $events]);
    }


    public function updateShow(Request $request)
    {
        $event = Auth()->user()->make_event()->find($request->event_id);   
        return view('event.showEdit', ['item' => $event]);
    }


    public function update(Request $request)
    {
        $event = event::find($request->event_id);
        $event->name = $request->name;
        $event->date = $request->date;
        $event->description = $request->description;
        $event->save();

        foreach($request->members as $member)
        {
            $event->invited()->detach($member);
            $event->invited()->attach($member);
        }

        return view('event.showEdit', ['item' => $event])->with('alert', 'Updated Successfully!');
    }


    public function delete(Request $request)
    {
        $event = event::find($request->event_id);
        $event->invited()->detach();
        $event->delete();

        $events = Auth()->user()->make_event()->get();
        return back()->with('alert', 'Updated Successfully!');
    }
}
