<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\ReportContent;
use App\Models\Request_db;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\News;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CommentController extends Controller
{
    /**
     * Shows the news for a given news_id.
     *
     * @param string $id
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $news = News::where('content_id', $id)->first();

        if (empty($news)) {
            throw new NotFoundHttpException();
        }

        return view('pages.news', ['news' => $news]);
    }

    public function delete(Request $request, $id)
    {
        $comment = Comment::find($id);

        $this->authorize('delete', $comment);
        $comment->delete();

        return $comment;
    }

    public function loadComments()
    {
        $validator = $request->validate([
            'pagination' => 'number|min:0',
            'offset' => 'number|min:0',
            'content_id' => 'number|min:0'
        ]);

        $pagination = $request->query('pagination') ?? 0;
        $offset = $request->query('offset') ?? 0;
        $content_id = $request->query('content_id');
    }

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
