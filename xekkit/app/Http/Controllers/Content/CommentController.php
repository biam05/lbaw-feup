<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Models\Comment;
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
}
