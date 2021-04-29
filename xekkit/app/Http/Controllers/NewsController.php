<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\News;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class NewsController extends Controller
{
    /**
     * Shows the news for a given news_id.
     *
     * @param string $id
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $news = DB::table('news')->where('content_id', $id)->first();
        $comments = DB::table('comments')->where('news_id', $id)->get();
        $comments_array = [];
        foreach ($comments as $comment){

        }
        if (empty($news)) {
            throw new NotFoundHttpException();
        }

        return view('pages.news', ['news' => $news]);
    }


    //----------------------------------------

    /**
     * Edit a news.
     *
     * @return News The news edited.
     */
    public function edit(Request $request)
    {

        $this->authorize('create', $news);

        $news->name = $request->input('name');
        $news->news_id = Auth::news()->id;
        $news->save();

        return $news;
    }

    public function delete(Request $request, $id)
    {
        $news = News::find($id);

        $this->authorize('delete', $news);
        $news->delete();

        return $news;
    }
}
