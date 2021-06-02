<?php

namespace App\Http\Controllers;

use App\Models\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Faq;

class RequestController extends Controller
{
    public function approve(Request $request, $id){
        $topic = Requests::findOrFail($id);
        $this->authorize('udpate', $topic);
        $topic->delete();

        return redirect('/faq/')->with('success', 'The question was successfully deleted.');
    }

    public function reject(Request $request, $id){
        $topic = Faq::findOrFail($id);
        $this->authorize('udpate', $topic);
        $topic->delete();

        return redirect('/faq/')->with('success', 'The question was successfully deleted.');
    }
}
