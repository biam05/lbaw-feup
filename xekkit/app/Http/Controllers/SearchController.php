<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\News;
use App\Models\User;

class SearchController extends Controller
{
    
    public function show(Request $request)
    {        
        $search = $request->query('search');

        $reservedSymbols = ['\''];
        $search = str_replace($reservedSymbols, '\\\'', $search);

        
        $news = News::whereRaw('search @@ websearch_to_tsquery(\'english\', ?)', [$search])
            ->orderByRaw('ts_rank(search, websearch_to_tsquery(\'english\', ?))', [$search])
            ->get();

        foreach($news as $new){
            $new->content = $new->content;
            //$new->content->author = $new->content->author;
        }
        
        $users = User::whereRaw('search @@ websearch_to_tsquery(\'english\', ?)', [$search])
            ->orderByRaw('ts_rank(search, websearch_to_tsquery(\'english\', ?))', [$search])
            ->get();
      
        return view('pages.search', ['news' => $news, 'users' => $users]);
    }
}
