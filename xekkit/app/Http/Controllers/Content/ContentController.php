<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\News;
use App\Models\Content;
use App\Models\Tag;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ContentController extends Controller
{
    public function toggleVote(Request $request)
    {        
        //return response()->json($request);
        $validator = Validator::make($request->all(), [
            'content_id' => 'required|integer',
            'upvote' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json('yes');
        }        

        // $content_id = $request->header('content_id');
        // $upvote = $request->header('upvote');

        // $content = Content::findOrFail($content_id);

        // $response = [
        //     'status' => false,
        //     'message' => "Vote ERROR"
        // ];
        
        // $user = Auth::user();
        // return response()->json(json_encode(Auth::user()));
        // $value = $user->is_partner ? 10 : 1;
        // $value = $upvote ? $value : -$value;
        
        // $user->voteOn()->toggle([$content_id => ['value' => $value]]);

        // $response = [
        //     'status' => true,
        //     'message' => $content->nr_votes
        // ];

        // return response()->json($response);
    }
}
