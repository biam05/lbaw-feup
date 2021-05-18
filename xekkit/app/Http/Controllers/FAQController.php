<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Faq;

class FAQController extends Controller
{
    public function show(Request $request)
    {      
        $topics = Faq::all();
        return view('pages.faq', [
            'topics' => $topics
        ]);
    }
}
