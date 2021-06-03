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
        $validator = Validator::make($request->all(), [
            'pagination' => 'integer|min:0',
            'sortBy' => 'integer|min:1|max:4',
            'search' => 'required|string',
        ]);

        
        $search = $request->query('search');

        $reservedSymbols = ['\''];
        $search = str_replace($reservedSymbols, '\\\'', $search);

  
        $pagination = $request->query('pagination') ?? 15;
        $sortby = $request->query('sortBy') ?? 3;

        $users = User::whereRaw('search @@ websearch_to_tsquery(\'simple\', ?)', [$search]);

        $news = News::whereRaw('search @@ websearch_to_tsquery(\'english\', ?)', [$search]);

        switch($sortby){
            case 1: // relevance
                $news->orderByRaw('ts_rank(search, websearch_to_tsquery(\'english\', ?)) DESC', [$search]);
                $users->orderByRaw('ts_rank(search, websearch_to_tsquery(\'english\', ?)) DESC', [$search]);
                break;
            case 2: // top
                $news->orderByDesc(
                    Content::select('nr_votes')
                        ->whereColumn('id', 'news.content_id')
                        ->orderBy('nr_votes')    
                );
                $users->orderByDesc('reputation', 'desc');
                break;
            case 3: // new
                $news->orderByDesc(
                    Content::select('date')
                        ->whereColumn('id', 'news.content_id')
                        ->orderBy('date')    
                );
                $users->orderByRaw('ts_rank(search, websearch_to_tsquery(\'english\', ?)) DESC', [$search]);
                break;

            case 4: // trending
                $news->orderBy('trending_score', 'desc');
                $users->orderByRaw('ts_rank(search, websearch_to_tsquery(\'english\', ?)) DESC', [$search]);
                break;

            default:
                $news->orderByRaw('ts_rank(search, websearch_to_tsquery(\'english\', ?)) DESC', [$search]);
                $users->orderByRaw('ts_rank(search, websearch_to_tsquery(\'english\', ?)) DESC', [$search]);
                break;
        };
        


        foreach($news as $new){
            $new->content = $new->content;
            //$new->content->author = $new->content->author;
        }
        
        
     
        return view('pages.search', ['news' => $news->get(), 'users' => $users->get(), 'query' => $search]);
    }

    /* public function loadFilterSearch(Request $request)
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
        $users = User::whereRaw('search @@ websearch_to_tsquery(\'english\', ?)', [$search]);



        switch($sortby){
            case 1: // relevance
                $news->orderByRaw('ts_rank(search, websearch_to_tsquery(\'english\', ?)) DESC', [$search]);
                $users->orderByRaw('ts_rank(search, websearch_to_tsquery(\'english\', ?)) DESC', [$search]);
                break;
            case 2: // top
                $news->orderByDesc(
                    Content::select('nr_votes')
                        ->whereColumn('id', 'news.content_id')
                        ->orderBy('nr_votes')    
                );
                $users->orderByDesc('reputation', 'desc');
                break;
            case 3: // new
                $news->orderByDesc(
                    Content::select('date')
                        ->whereColumn('id', 'news.content_id')
                        ->orderBy('date')    
                );
                $users->orderByRaw('ts_rank(search, websearch_to_tsquery(\'english\', ?)) DESC', [$search]);
                break;
            case 4: // trending
                $news->orderBy('trending_score', 'desc');
                $users->orderByRaw('ts_rank(search, websearch_to_tsquery(\'english\', ?)) DESC', [$search]);
                break;
        };
            
            
        dd($users);

        $news = $news->paginate($pagination);
        foreach($news as $new){
            $new->content = $new->content;
        }
        
        return view('pages.search', ['news' => $news, 'users' => $users, 'query' => $search]);

    } */

    /* public function loadUsersSearch(Request $request)
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
    } */
}
