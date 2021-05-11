<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\News;
use App\Models\Content;
use App\Models\Follow;

class HomepageController extends Controller
{
  
    public function show(Request $request)
    {      

        $feedPosts = array(); 
        
        if(Auth::check()){
            $feedPosts = News::whereIn('content_id', function ($query) {
                $query->select('id')
                    ->from('content')
                    ->whereIn('author_id', function ($query) {
                        $query->select('users_id')
                            ->from('follow')
                            ->where('follower_id', Auth::id());
                    });
            })->get();
        }        

        $posts = News::all();
        foreach($posts as $post){
            $post->content = $post->content;
        }

        $recentPosts = $posts->sortByDesc('content.date');      
        $hotPosts = $posts->sortByDesc('content.nr_votes');
        $trendingPosts = $posts->sortByDesc('trending_score');

        return view('pages.homepage', [
            'trendingPosts' => $trendingPosts,
            'feedPosts' => $feedPosts,
            'recentPosts'=> $recentPosts, 
            'hotPosts'=> $hotPosts]);
    }
}
