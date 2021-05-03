<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Models\User;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

use App\Models\News;
use App\Models\Content;
use App\Models\Tag;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ContentController extends Controller
{
    public function makeVote(Request $request){

        $validator = Validator::make($request->all(), [
            'content_id' => 'required|integer',
            'upvote' => 'required|boolean'
        ]);

        $content_id = $request->header('content_id');
        $vote = $request->header('upvote');

        $content = Content::findOrFail($content_id);
        if($vote){
            $content->nr_votes++;
        } else {
            $content->nr_votes--;
        }

        $response = [
            'status' => true,
            'message' => "Vote OK"
        ];

        if( !$content->save() ){
            $response = [
                'status' => false,
                'message' => "Vote NOK"
            ];
        }

        return json($response);
    }
}
