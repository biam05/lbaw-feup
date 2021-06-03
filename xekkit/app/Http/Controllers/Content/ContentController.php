<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Models\Comment;
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
use App\Models\Requests;
use App\Models\ReportContent;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ContentController extends Controller
{
    public function toggleVote(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'content_id' => 'required|integer',
            'upvote' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json($validator, 400);
        }

        $content_id = $request->content_id;
        $upvote = $request->upvote;

        $content = Content::findOrFail($content_id);

        $response = [
            'status' => false,
            'message' => "Vote ERROR"
        ];

        $user = Auth::user();

        if($user == null) // not logged in
            return response()->json($response);

        $value = $user->is_partner ? 10 : 1;
        $value = $upvote ? $value : -$value;

        $voted = Content::getVoteFromContent($content);
        if($voted == "downvote"){
            if($upvote) $user->voteOn()->toggle([$content_id => ['value' => $value]]);
        }
        else if($voted == "upvote"){
            if(!$upvote) $user->voteOn()->toggle([$content_id => ['value' => $value]]);
        }

        $user->voteOn()->toggle([$content_id => ['value' => $value]]);

        $content = Content::findOrFail($content_id);

        $response = [
            'status' => true,
            'message' => $content->nr_votes,
            'vote' => $upvote
        ];

        return response()->json($response);
    }

    public function report(Request $request, $id)
    {

        $validator = $request->validate([
            'body' => 'required|string',
        ]);

        $comment = Comment::findOrFail($id);


        DB::transaction(function () use ($request, $id) {
            // create request
            $db_request = new Requests;

            $db_request->reason = $request->input('body');
            $db_request->from_id = Auth::user()->id;

            $db_request->save();

            $request_id = $db_request->id;

            //create report
            $report = new ReportContent();
            $report->request_id=$request_id;
            $report->to_content_id=$id;

            $report->save();

            return $request_id;
        });

        return redirect()->back();
    }


}
