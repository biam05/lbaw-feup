<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\News;

class NewsController extends Controller
{
    /**
     * Shows the news for a given news_id.
     *
     * @param  string  $news_id
     * @return Response
     */
    public function show()
    {
      return view('pages.news');
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
