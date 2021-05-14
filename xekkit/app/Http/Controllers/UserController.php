<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Request_db;
use App\Models\ReportUser;
use App\Models\News;
use App\Models\Content;
use App\Models\Follow;

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

        $following = $user->following;

        //dd($following);

        return view('pages.user', [
            'user' => $user,
            'recentPosts' => $recentPosts,
            'topPosts' => $topPosts,
            'trendingPosts' => $trendingPosts,
            'following' => $following
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

    public function report(Request $request, $id)
    {
      
        $validator = $request->validate([
            'body' => 'required|string',
        ]);

        $user = User::findOrFail($id);
        

        DB::transaction(function () use ($request, $id) {
            // create request
            $db_request = new Request_db;
           
            $db_request->reason = $request->input('body');
            $db_request->from_id = Auth::user()->id;

            $db_request->save();

            $request_id = $db_request->id;

            //create report
            $report = new ReportUser();
            $report->request_id=$request_id;
            $report->to_users_id=$id;

            $report->save();

            return $request_id;
        });

        return redirect()->back();
    }

}
