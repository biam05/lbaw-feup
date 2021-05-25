<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\ReportContent;
use App\Models\Request_db;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\News;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CommentController extends Controller
{
    public function create(Request $request)
    {
        $validator = $request->validate([
            'news_id' => 'required|integer',
            'body' => 'required|string',
        ]);

        $news = News::where('content_id', $request->input('news_id'))->first();

        $this->authorize('create', Comment::class);

        if (empty($news)) {
            throw new NotFoundHttpException();
        }

        $id = DB::transaction(function () use ($request, $news) {
            // create content
            $content = new Content;

            $content->body = $request->input('body');
            $content->author_id = Auth::user()->id;

            $content->save();

            $id = $content->id;

            //create news
            $comment = new Comment;
            if(!empty($request->input('reply_to_id'))){
                $comment->reply_to_id = $request->input('reply_to_id');
            }

            $comment->news_id = $news->content_id;
            $comment->content_id = $id;
            $comment->save();

            return $id;
        });

        return redirect('/news/' . $news->content_id)->with('success', 'The comment was successfully created.');
    }

    public function delete(Request $request, $id)
    {
        $validator = $request->validate([
            'password' => 'required|string',
        ]);

        $comment = Comment::findOrFail($id);

        $news_id = $comment->news_id;

        $this->authorize('delete', $comment);

        if (!Hash::check($request->password, $request->user()->password)) {
            return back()->withErrors([
                'password' => ['The provided password does not match our records.']
            ]);
        }

        /*if (!$request->hasHeader('id')) {
            return back()->withErrors([
                'parameter' => ['Error while processing your request.']
            ]);
        }*/


        $comment->content->delete();

        return redirect('/news/' . $news_id)->with('success', 'The comment was successfully deleted.');
    }

/*     public function loadComments()
    {
        $validator = $request->validate([
            'pagination' => 'number|min:0',
            'offset' => 'number|min:0',
            'content_id' => 'number|min:0'
        ]);

        $pagination = $request->query('pagination') ?? 0;
        $offset = $request->query('offset') ?? 0;
        $content_id = $request->query('content_id');
    } */

    public function report(Request $request, $id)
    {
        
        $validator = $request->validate([
            'body' => 'required|string',
        ]);

        $comment = Comment::findOrFail($id);
        

        DB::transaction(function () use ($request, $id) {
            // create request
            $db_request = new Request_db;
           
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
