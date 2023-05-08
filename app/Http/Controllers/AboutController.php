<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    function show()
    {
        return view('welcome',['name'=>'Aniket']);
    }

    function show2($name)
    {
        return $name;
    }
}
