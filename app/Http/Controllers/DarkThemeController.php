<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DarkThemeController extends Controller
{

    public function store(Request $request)
    {
        if( session('dark-theme') == NULL )
        {
            $request->session()->put('dark-theme', 1);
            $msg = "dark-theme activated.";
            return response()->json(array('msg'=> $msg), 200);
        }

        if( session('dark-theme') == 1 )
        {
            $request->session()->put('dark-theme', 0);
            $msg = "light-theme activated.";
            return response()->json(array('msg'=> $msg), 200);
        }

        if( session('dark-theme') == 0 )
        {
            $request->session()->put('dark-theme', 1);
            $msg = "dark-theme activated.";
            return response()->json(array('msg'=> $msg), 200);
        }


    }


}
