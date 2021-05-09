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

      $following = Auth::user()->following;
      $feedPosts = array();
      foreach($following as $user){
        $contents = $user->contents;
        foreach($contents as $content){
          array_push($feedPosts, $content->new);
        }
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
