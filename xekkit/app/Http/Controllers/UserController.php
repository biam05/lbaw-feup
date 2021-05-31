<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Request_db;
use App\Models\PartnerRequest;
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
        $this->authorize('viewAny', User::class);

        $user = User::getUser($username);   
        $posts = $user->news();

        $recentPosts = $posts->sortByDesc('content.date');      
        $topPosts = $posts->sortByDesc('content.nr_votes');
        $trendingPosts = $posts->sortByDesc('trending_score');

        $following = $user->following;

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

    public function partner_request(Request $request, $username)
    {
        
        $user = User::where('username','=',$username)->first();   
        User::findOrFail($user->id);
        
        DB::transaction(function () use ($request) {
            // create request
            $db_request = new Request_db;
           
            $db_request->reason = $request->input('body');
            $db_request->from_id = Auth::user()->id;

            $db_request->save();

            $request_id = $db_request->id;

            //create report
            $partner_request = new PartnerRequest();
            $partner_request->request_id=$request_id;

            $partner_request->save();

            return $request_id;
        });

        return redirect()->back();
    }

    public function stop_partnership(Request $request, $username)
    {
        if(! Hash::check($request->password, $request->user()->password)) {
            return back()->withErrors([
                'password' => ['The provided password does not match our records.']
            ]);
        }
        
        $user = User::where('username','=',$username)->first();   
        User::findOrFail($user->id);
        $user->is_partner=false;
        $user->save();
        return redirect("/user/".$username);
    }
    public function toggleFollow(Request $request){

        $validator = Validator::make($request->all(), [
            'users_id' => 'required|integer',
            'follower_id' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json($validator);
        }   
        
        $users_id = $request->users_id;
        $follower_id = $request->follower_id;

        $followed = User::findOrFail($users_id);
        $follower = Auth::user();

        //$follow = Follow::findOrFail($users_id, $follower_id);

        $following = DB::table('follow')
            ->where('users_id', $users_id)
            ->where('follower_id', $follower_id)
            ->first();

        if($following != "") $follow = false;
        else $follow = true;
        
        if($follow === true) $followed->followedBy()->attach([$follower_id]);
        else $followed->followedBy()->detach([$follower_id]);

        $response = [
            'status' => true,
            'message' => "Follow/Unfollow OK",
            'users_id' => $users_id,
            'follower_id' => $follower_id,
            'follow' => $follow

        ];

        return response()->json($response);
    }

}
