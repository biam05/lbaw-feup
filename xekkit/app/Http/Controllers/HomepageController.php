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

      $recentPosts = News::all();
      foreach($recentPosts as $recentPost){
        $recentPost->content = $recentPost->content;
      }

      $recentPosts = $recentPosts->sortByDesc('content.date');      
      $hotPosts = $recentPosts->sortByDesc('content.nr_votes');

      return view('pages.homepage', [
        'feedPosts' => $feedPosts,
        'recentPosts'=> $recentPosts, 
        'hotPosts'=> $hotPosts]);
    }
}
