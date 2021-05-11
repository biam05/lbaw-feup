<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\News;
use App\Models\Content;
use App\Models\Tag;

class UserController extends Controller
{
    /**
     * Shows the user for a given username.
     *
     * @param  string  $username
     * @return Response
     */
    public function show($username)
    {
        $user = User::where('username','=',$username)->first();   

        $posts = News::whereIn('content_id', function($query) use ($user) {
            $query->select('id')
                ->from('content')
                ->where('author_id', $user->id);
        })->get();

        $recentPosts = $posts->sortByDesc('content.date');      
        $topPosts = $posts->sortByDesc('content.nr_votes');
        $trendingPosts = $posts->sortByDesc('trending_score');

        return view('pages.user', [
            'user' => $user,
            'recentPosts' => $recentPosts,
            'topPosts' => $topPosts,
            'trendingPosts' => $trendingPosts,
        ]);
    }


    //----------------------------------------
    /**
     * Edit a user.
     *
     * @return User The user edited.
     */
    public function edit(Request $request)
    {

        $this->authorize('create', $user);

        $user->name = $request->input('name');
        $user->user_id = Auth::user()->id;
        $user->save();

        return $user;
    }

    public function delete(Request $request, $id)
    {
        $user = User::find($id);

        $this->authorize('delete', $user);
        $user->delete();

        return $user;
    }
}
