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
        $request = Requests::findOrFail($id);
        //$this->authorize('udpate', $request);
        $request->status = Requests::STATUS_APPROVE;
        $request->revision_date = date('Y-m-d H:i:s');
        $request->moderator_id = Auth::user()->id;
        $request->save();

        return redirect('/notifications/')->with('success', 'The request was accepted successfully.');
    }

    public function reject(Request $request, $id){
        $request = Requests::findOrFail($id);
        //$this->authorize('udpate', $request);
        $request->status = Requests::STATUS_REJECT;
        $request->revision_date = date('Y-m-d H:i:s');
        $request->moderator_id = Auth::user()->id;
        $request->save();

        return redirect('/notifications/')->with('success', 'The request was rejected successfully.');
    }
}
