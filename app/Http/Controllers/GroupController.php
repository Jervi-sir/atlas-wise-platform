<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;


class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();
        return view('groups.index', ['groups' => $groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groups.create');

    }

    public function new(Request $request)
    { 
        $group = new Group;
        $group->name = $request->get('group-name');
        $group->president_id = $request->get('president-id');
        $group->description = $request->get('description');
        $group->save();

        return back()->with(['success' => 1]);
    }

    public function addMembers()
    {
        return view('groups.addMembers');
    }

    public function add(Request $request)
    {
        $group = Auth()->user()->president_of()->first();
        $group->users()->detach($request->members);
        $group->users()->sync($request->members);

        return back()->with('alert', 'Group Created Successfully!');
    }

    public function editGroup()
    {
        $group = Auth()->user()->president_of()->first();
        return view('groups.edit', ['group' => $group]);

    }

    public function edit(Request $request)
    {
        $group = Auth()->user()->president_of()->first();
        $group->name = $request->get('group-name');
        $group->description = $request->description;
        $group->save();

        return back()->with('alert', 'Group Updated!');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('groups.index');

    }

  
}
