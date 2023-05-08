<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

class resetGame extends Controller
{
    //
    public function reset1($word)
    {
        
        return response()->json(true, 200);
    }
}
