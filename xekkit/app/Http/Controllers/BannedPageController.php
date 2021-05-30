<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BannedPageController extends Controller
{
    public function show()
    {      
        return view('pages.banned');
    }
}
