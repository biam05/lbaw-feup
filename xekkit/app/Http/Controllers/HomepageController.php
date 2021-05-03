<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    /**
     * Shows the news for a given news_id.
     *
     * @return Response
     */
    public function show()
    {
      return view('pages.homepage');
    }
}
