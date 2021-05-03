<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Models\News;
use App\Models\User;
use App\Models\Content;

class SearchController extends Controller
{
    public function show(Request $request)
    {        
        $search = $request->query('search');

        $reservedSymbols = ['\''];
        $search = str_replace($reservedSymbols, '\\\'', $search);

        
        $news = News::whereRaw('search @@ websearch_to_tsquery(\'english\', ?)', [$search])
            ->orderByRaw('ts_rank(search, websearch_to_tsquery(\'english\', ?)) DESC', [$search])
            ->paginate(15);

        foreach($news as $new){
            $new->content = $new->content;
            //$new->content->author = $new->content->author;
        }
        
        $users = User::whereRaw('search @@ websearch_to_tsquery(\'simple\', ?)', [$search])
            ->orderByRaw('ts_rank(search, websearch_to_tsquery(\'simple\', ?)) DESC', [$search])
            ->paginate(15);
      
        return view('pages.search', ['news' => $news, 'users' => $users, 'query' => $search]);
    }

    public function loadPostsSearch(Request $request)
    {      
        $validator = Validator::make($request->all(), [
            'pagination' => 'integer|min:0',
            'sortBy' => 'integer|min:1|max:4',
            'search' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response(400);
        }


        $pagination = $request->query('pagination') ?? 15;
        $sortby = $request->query('sortBy') ?? 3;

        $reservedSymbols = ['\''];
        $search = str_replace($reservedSymbols, '\\\'', $request->search);
        
        $news = News::whereRaw('search @@ websearch_to_tsquery(\'english\', ?)', [$search]);



        switch($sortby){
            case 1: // relevance
                $news->orderByRaw('ts_rank(search, websearch_to_tsquery(\'english\', ?)) DESC', [$search]);
                break;
            case 2: // top
                $news->orderByDesc(
                    Content::select('nr_votes')
                        ->whereColumn('id', 'news.content_id')
                        ->orderBy('nr_votes')    
                );
                break;
            case 3: // new
                $news->orderByDesc(
                    Content::select('date')
                        ->whereColumn('id', 'news.content_id')
                        ->orderBy('date')    
                );

                break;
            case 4: // trending
                $news->orderBy('trending_score', 'desc');
                break;
        };
            
            

        $news = $news->paginate($pagination);
        foreach($news as $new){
            $new->content = $new->content;
        }
        
        return response()->json($news);
    }

    public function loadUsersSearch(Request $request)
    {        

        $validator = $request->validate([
            'pagination' => 'integer|min:0',
            'sortBy' => 'integer|min:1|max:2',
            'search' => 'required|string',
        ]);


        $pagination = $request->query('pagination') ?? 15;
        $sortby = $request->query('sortBy') ?? 2;

        $reservedSymbols = ['\''];
        $search = str_replace($reservedSymbols, '\\\'', $request->search);
        
        $users = User::whereRaw('search @@ websearch_to_tsquery(\'english\', ?)', [$search]);

        switch($sortby){
            case 1: // relevance
                $users->orderByRaw('ts_rank(search, websearch_to_tsquery(\'english\', ?)) DESC', [$search]);
                break;
            case 2: // top
                $users->orderByDesc('reputation', 'desc');
                break;
        };
            
        $users = $users->paginate($pagination);
        
        return response()->json($users);
    }
}
