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

      // if(Auth::check()){
      //   $feedPosts = DB::select('
      //   SELECT n.content_id, n.title, n.image, c.date, c.body, c.nr_votes, u.username, u.is_partner
      //   FROM news n, content c, users u
      //   WHERE n.content_id = c.id
      //       AND c.author_id = u.id
      //       AND u.is_deleted = \'false\'
      //       AND u.is_banned = \'false\'
      //       AND c.author_id IN (SELECT f.users_id FROM follow f WHERE f.follower_id = :my_users_id)
      //   ORDER BY c.date DESC
      //   ', ['my_users_id' => Auth::id()]);


      //   //dd(Auth::user()->username);
      // }
      
      

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
