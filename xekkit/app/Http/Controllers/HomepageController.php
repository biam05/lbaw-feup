<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class HomepageController extends Controller
{
    /**
     * Shows the user for a given username.
     *
     * @return Response
     */
    public function show()
    {
      return view('pages.homepage');
    }
}
